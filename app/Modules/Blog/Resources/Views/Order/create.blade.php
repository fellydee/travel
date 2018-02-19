@extends('layouts.backend.master')

@section('title', 'Order ')



@section('content')
    @include('layouts.backend.includes.notice')
    <div class="uk-grid" >
        <div class="uk-width-large-10-10">
            @if(Session::has('msg'))
                <div class="uk-alert uk-alert-success" data-uk-alert>
                    <a href="#" class="uk-alert-close uk-close"></a>
                    {!! Session::get('msg') !!}
                </div>
            @endif
            {!! Form::open(['url' => route("order_store"), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']) !!}
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Create New Order</span></h2>
                                <div class="uk-width-medium-1-3">
                                    {{--<div class="md-btn-group">--}}
                                        {{--<a href="{{ route('manpower_service_document_index') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">All</a>--}}
                                        {{--<a href="{{ route('manpower_service_document_create') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">Add</a>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-margin-top">

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="contact_category_id" class="uk-vertical-align-middle">Package <i style="color:red" class="material-icons">stars</i></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <select id="contact_category_id" name="package_id" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" required>
                                            <option value="">Select Package</option>
                                            @foreach($pack as $value)

                                                    <option value="{{ $value->id }}">{{ $value->title }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Name</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="name">Name</label>
                                        <input class="md-input" type="text" id="title" name="name">
                                        @if($errors->has('name'))
                                             <br/>
                                            <span style="color:orangered;">{!!$errors->first('name')!!}</span>

                                        @endif
                                    </div>
                                </div>

                                <br>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Email</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="name">Email</label>
                                        <input class="md-input" type="text" id="title" name="email">
                                        @if($errors->has('email'))
                                            <br/>
                                            <span style="color:orangered;">{!!$errors->first('email')!!}</span>

                                        @endif
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Phone</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="name">Phone</label>
                                        <input class="md-input" type="text" id="title" name="phone">
                                        @if($errors->has('phone'))
                                            <br/>
                                            <span style="color:orangered;">{!!$errors->first('phone')!!}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="comment">Address </label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="note">Address here</label>
                                        <textarea type="text" name="address" id="summary" class="md-input" cols="4" rows="4"></textarea>
                                        @if($errors->has('address'))

                                            <span style="color:red; position: relative; right:-500px">{!!$errors->first('address')!!}</span>

                                        @endif
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="comment">Note </label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="note">Note here</label>
                                        <textarea type="text" name="note" id="summary" class="md-input" cols="4" rows="4"></textarea>
                                        @if($errors->has('note'))

                                            <span style="color:red; position: relative; right:-500px">{!!$errors->first('note')!!}</span>

                                        @endif
                                    </div>
                                </div>



                                <br>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="contact_category_id" class="uk-vertical-align-middle">Status <i style="color:red" class="material-icons">stars</i></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <select id="contact_category_id" name="status" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" required>
                                            <option value="">Select Status</option>


                                                <option value="0">Pending</option>
                                                <option value="1">Confirmed</option>


                                        </select>
                                    </div>
                                </div>



                                <div class="uk-grid uk-ma" data-uk-grid-margin>
                                    <div class="uk-width-1-1 uk-float-left">
                                        <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection


@section('custom_footer_js')
    <script>
        $('#sidebar_blog').addClass('current_section');

    </script>

    <script src="{{ asset('assets/js/pages/components_notifications.min.js') }} "></script>
    <script src="{{ asset('bower_components/ckeditor/ckeditor.js') }} "></script>
@endsection
