@extends('backend.layouts.app')

@section('styles')
@endsection

@section('content')

    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="main-content">
            <div class="d-md-flex align-items-center justify-content-between m-b-30">
                <div class="page-header m-b-0">
                    <h2 class="m-b-0 header-title">Order Name Here</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="index.html" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                            <a href="orders.html" class="breadcrumb-item">Orders</a>
                            <span class="breadcrumb-item active">>Order Name Here</span>
                        </nav>
                    </div>
                </div>

                <div class="m-b-15">
                    <button class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                        <span>Delete</span>
                    </button>
                    <button class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                        <span>Edit</span>
                    </button>
                </div>
            </div>

            <div class="tab-content m-t-15">

                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-muted">Service </p>
                                        <h4 class="m-b-0 ls-1">Personal Driver</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-muted">Service Provider</p>
                                        <h4 class="m-b-0 ls-1">Mahara</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-muted">Requester</p>
                                        <h4 class="m-b-0 ls-1">Abdullah Al Sammary</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-muted">Worker</p>
                                        <h4 class="m-b-0 ls-1">Farzad Ahmed Khan</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Order Description</h4>
                    </div>
                    <div class="card-body">
                        <p>Special cloth alert. The key to more success is to have a lot of pillows. Surround yourself with angels, positive energy, beautiful people, beautiful souls, clean heart, angel. They will try to close the door on you,
                            just open it. A major key, never panic. Don’t panic, when it gets crazy and rough, don’t panic, stay calm. They key is to have every key, the key to open every door.</p>
                        <p>The other day the grass was brown, now it’s green because I ain’t give up. Never surrender. Lion! I’m up to something. Always remember in the jungle there’s a lot of they in there, after you overcome they, you will
                            make it to paradise.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Basic Info</h4>

                                <div class="table-responsive">
                                    <table class="product-info-table m-t-20">
                                        <tbody>
                                            <tr>
                                                <td>Price:</td>
                                                <td class="text-dark font-weight-semibold text-right">$199.00</td>
                                            </tr>
                                            <tr>
                                                <td>Category:</td>
                                                <td class="text-dark font-weight-semibold text-right">House Keeping</td>
                                            </tr>
                                            <tr>
                                                <td>Contract type:</td>
                                                <td class="text-dark font-weight-semibold text-right">On Time</td>
                                            </tr>
                                            <tr>
                                                <td>Contract Period</td>
                                                <td class="text-dark font-weight-semibold text-right">3 months</td>
                                            </tr>
                                            <tr>
                                                <td>Visits Qty.</td>
                                                <td class="text-dark font-weight-semibold text-right">12 per month</td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Worker Info</h4>

                                <div class="table-responsive">
                                    <table class="product-info-table m-t-20">
                                        <tbody>
                                            <tr>
                                                <td>Nationality:</td>
                                                <td class="text-dark font-weight-semibold text-right">India</td>
                                            </tr>
                                            <tr>
                                                <td>Company:</td>
                                                <td class="text-dark font-weight-semibold text-right">Company Name</td>
                                            </tr>
                                            <tr>
                                                <td>Job Title:</td>
                                                <td class="text-dark font-weight-semibold text-right">Driver</td>
                                            </tr>
                                            <tr>
                                                <td>Location:</td>
                                                <td class="text-dark font-weight-semibold text-right">Alyarmok, Riyadh</td>
                                            </tr>
                                            <tr>
                                                <td>Start Date</td>
                                                <td class="text-dark font-weight-semibold text-right">12/05/2021</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Contract Info</h4>

                                <div class="table-responsive">
                                    <table class="product-info-table m-t-20">
                                        <tbody>
                                            <tr>
                                                <td>Start Date:</td>
                                                <td class="text-dark font-weight-semibold text-right">23 Nov 2021</td>
                                            </tr>
                                            <tr>
                                                <td>End Date:</td>
                                                <td class="text-dark font-weight-semibold text-right">23 Nov 2021</td>
                                            </tr>
                                            <tr>
                                                <td>Days:</td>
                                                <td class="text-dark font-weight-semibold text-right">Sun,Mon,Fri</td>
                                            </tr>
                                            <tr>
                                                <td>Time</td>
                                                <td class="text-dark font-weight-semibold text-right">Night</td>
                                            </tr>
                                            <tr>
                                                <td>Status:</td>
                                                <td class="text-dark font-weight-semibold text-right">
                                                    <span class="badge badge-pill badge-cyan">In Progress</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
        <!-- Content Wrapper END -->

        <!-- Footer START -->
        <footer class="footer">
            <div class="footer-content">
                <p class="m-b-0">Copyright © 2021 Sanad.sa All rights reserved.</p>
                <span>
                <a href="" class="text-gray m-r-15">Term &amp; Conditions</a>
                <a href="" class="text-gray">Privacy &amp; Policy</a>
            </span>
            </div>
        </footer>
        <!-- Footer END -->

    </div>
    <!-- Page Container END -->
@endsection
@section('scripts')
    
@endsection