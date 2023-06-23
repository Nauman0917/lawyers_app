@extends('front-layouts.master-user-layout')
@section('content')
    <div class="col-xl-9 col-md-8">
        <h4 class="widget-title">All Lawyers</h4>

        <div class="row">
            @foreach ($lawyers as $lawyer)
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="service-widget flex-fill">
                        <div class="service-img">
                            <a href="{{ route('lawyer.profile', $lawyer->id) }}">
                                <img class="img-fluid serv-img" alt="Service Image"
                                    src="{{ asset('front') }}/assets/img/services/service-01.jpg">
                            </a>
                            <div class="item-info">
                                <div class="service-user">
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('front') }}/assets/img/provider/provider-01.jpg" alt="">
                                    </a>
                                    <span class="service-price">$25</span>
                                </div>
                                <div class="cate-list">
                                    <a class="bg-yellow" href="service-details.html">Glass</a>
                                </div>
                            </div>
                        </div>
                        <div class="service-content">
                            <h3 class="title">
                                <a href="">{{ $lawyer->name }}</a>
                            </h3>
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <span class="d-inline-block average-rating">(4.3)</span>
                            </div>
                            <div class="user-info">
                                <div class="service-action">
                                    <div class="row">
                                        <div class="col">
                                            <a href="" class="text-success"><i class="fas fa-phone-alt"></i>
                                                {{ $lawyer->phone }}</a>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            <!-- Pagination Links -->
            <div class="pagination">
                <ul>
                    <li class="active">
                        <a href="javascript:void(0);">1</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">2</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">3</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">4</a>
                    </li>
                    <li class="arrow">
                        <a href="javascript:void(0);"><i class="fas fa-angle-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer"> <a href="javascript:;" class="btn btn-success si_accept_confirm">Yes</a>
                    <button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteNotConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">Inactive Service?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Service is Booked and Inprogress..</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
@endsection
