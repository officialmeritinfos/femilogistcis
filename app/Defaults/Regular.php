<?php

namespace App\Defaults;

use App\Models\GeneralSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait Regular
{
    /**
     * Generate a random code in the format `213H-4532-HJUY-567U`.
     */
    private function generateReferenceCode(): string
    {
        $segments = [
            strtoupper(Str::random(3)) . rand(0, 9),
            rand(1000, 9999),
            strtoupper(Str::random(4)),
            strtoupper(Str::random(3)) . rand(0, 9)
        ];

        return implode('-', $segments);
    }

    /**
     * Generate a random tracking ID in the format `CF106039854`.
     */
    private function generateTrackingId(): string
    {
        return strtoupper(Str::random(2)) . rand(100000000, 999999999);
    }

    /**
     * Ensure uniqueness of generated codes.
     */
    public function generateUniqueCode($table, $column, callable $generator): string
    {
        $code = $generator();

        $exists = DB::table($table)->where($column, $code)->exists();

        return $exists ? $this->generateUniqueCode($table, $column, $generator) : $code;
    }

    private function uniqueCode($length=10)
    {
        $id = Str::random($length);
        return $id;
    }

    public function generateId($table,$column,$length=10): string
    {
        $id = strtoupper($this->uniqueCode($length));
        $query = DB::table($table)->select($column)->where($column,$id)->first();
        return (empty($query)) ? $id : $this->generateId($table,$column,$length);
    }

    public function codeExpiration()
    {
        $web = GeneralSetting::where('id',1)->first();
        $codeExpiration = $web->codeExpiration;
        return $codeExpiration;
    }

}
