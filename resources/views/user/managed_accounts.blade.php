@extends('user.base')
@section('content')
    @include('templates.notification')
    <div class="ui-kit-card mb-24">
        <h3>{{$siteName}} Account manager</h3>
        <div class="alert alert-primary" role="alert">
            <h4 class="alert-heading">Heads up!</h4>
            <p>
                Don’t have time to trade or learn how to trade? Our Account Management Service is The Best Profitable Trading
                Option for you, We can help you to manage your account in the financial MARKET with a simple subscription model.
            </p>
            <hr>
            <p class="mb-0">Reach us at {{$web->email}} for more info.</p>
        </div>
        <div class="text-center">
            <button class="btn default-btn"
            data-bs-toggle="modal" data-bs-target="#subscribe">Subscribe now</button>
        </div>
    </div>

    <div class="container-fluid">
        <div class="ui-kit-cards grid mb-24">
            <h3>Basic Table</h3>

            <div class="latest-transaction-area">
                <div class="table-responsive h-auto" data-simplebar>
                    <table class="table align-middle mb-0">
                        <thead>
                        <tr>
                            <th scope="col">ACCOUNT ID</th>
                            <th scope="col">ACCOUNT PASSWORD</th>
                            <th scope="col">ACCOUNT TYPE</th>
                            <th scope="col">CURRENCY</th>
                            <th scope="col">LEVERAGE</th>
                            <th scope="col">SERVER</th>
                            <th scope="col">DURATION</th>
                            <th scope="col">SUBMITTED AT</th>
                            <th scope="col">EXPIRING AT</th>
                            <th scope="col">STARTED AT</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($accounts as $account)
                            <tr>
                                <td>{{$account->accountId}}</td>
                                <td>{{$account->accountPassword}}</td>
                                <td>{{$account->accountType}}</td>
                                <td>{{$account->currency}}</td>
                                <td>{{$account->leverage}}</td>
                                <td>{{$account->server}}</td>
                                <td>{{$account->duration}}</td>
                                <td>{{$account->created_at}}</td>
                                <td>{{date('d-m-Y',$account->expires_at)}}</td>
                                <td>
                                    @switch($account->status)
                                        @case(1)
                                        {{date('d-m-Y h:i:s',$account->started_at)}}
                                        @break
                                        @case(2)
                                            <span class="badge bg-info">Pending</span>
                                        @break
                                        @case(4)
                                            {{date('d-m-Y h:i:s',$account->started_at)}}
                                        @break
                                        @default
                                            <span class="badge bg-danger">Cancelled</span>
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    @switch($account->status)
                                        @case(1)
                                            <span class="badge bg-success">Completed</span>
                                        @break
                                        @case(2)
                                            <span class="badge bg-info">Pending</span>
                                        @break
                                        @case(4)
                                            <span class="badge bg-primary">Ongoing</span>
                                        @break
                                        @default
                                            <span class="badge bg-danger">Cancelled</span>
                                        @break
                                    @endswitch
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-2-fill"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" href="{{route('subtrade.delete',['id'=>$account->reference])}}">
                                                    Delete
                                                    <i class="ri-delete-bin-6-line"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    @push('js')
        <div class="modal fade" id="subscribe" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Subscribe to subscription Trading</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="{{route('subtrade.new')}}" method="post">
                            @csrf
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Subscription Duration</label>
                                <select class="form-control" id="inputEmail4" name="subDuration">
                                    <option value="">Select Duration</option>
                                    @foreach($durations as $duration)
                                        <option value="{{$duration->id}}"
                                        data-amount="{{$duration->amount}}">{{$duration->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Amount To Pay($)</label>
                                <input type="text" class="form-control" id="inputPassword4" readonly name="amount">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="inputAddress" class="form-label">Account Id</label>
                                <input type="text" class="form-control" id="inputAddress" name="accountId">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="inputAddress2" class="form-label">Account Password</label>
                                <input type="text" class="form-control" id="inputAddress2" name="accountPassword">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Account Type</label>
                                <input type="text" class="form-control" id="inputCity" placeholder="E.g Standard"
                                name="accountType">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Account currency</label>
                                <input type="text" class="form-control" id="inputCity" placeholder="E.g USD"
                                name="currency">
                            </div>
                            <div class="col-md-6">
                                <label for="inputZip" class="form-label">Leverage</label>
                                <input type="text" class="form-control" id="inputZip" placeholder="E.g 1:500"
                                name="leverage">
                            </div>
                            <div class="col-md-6">
                                <label for="inputZip" class="form-label">Server</label>
                                <input type="text" class="form-control" id="inputZip" placeholder="E.g HantecGlobal-live"
                                name="server">
                                <small>Amount will be deducted from your Account balance</small>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary rounded-pill">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(function (){
                $('select[name="subDuration"]').on('change',function (){
                    var amount = $(this).find(':selected').data('amount')

                    $('input[name="amount"]').val(amount)
                })
            })
        </script>
    @endpush
@endsection
