@extends('layouts.backend.master')

@section('title', 'Package')



@section('content')
    @include('layouts.backend.includes.notice')
    <div class="uk-grid" ng-controller="InvoiceController">
        <div class="uk-width-large-10-10">
            @if(Session::has('msg'))
                <div class="uk-alert uk-alert-success" data-uk-alert>
                    <a href="#" class="uk-alert-close uk-close"></a>
                    {!! Session::get('msg') !!}
                </div>
            @endif
            {!! Form::open(['url' => route("package_update",$data->id), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']) !!}
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Edit Package</span></h2>
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
                                        <label for="contact_category_id" class="uk-vertical-align-middle">Service <i style="color:red" class="material-icons">stars</i></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <select id="contact_category_id" name="service_id" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" required>
                                            <option value="">Select Service</option>
                                            @foreach($service as $value)
                                                    @if($data["service_id"]==$value["id"])
                                                    <option value="{{ $value->id }}" selected>{{ $value->title }}</option>
                                                    @else
                                                    <option value="{{ $value->id }}" >{{ $value->title }}</option>
                                                    @endif

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Title</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="name">Title</label>
                                        <input class="md-input" type="text" id="title" value="{{ $data["title"] }}" name="title">
                                        @if($errors->has('title'))
                                             <br/>
                                            <span style="color:orangered;">{!!$errors->first('title')!!}</span>

                                        @endif
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="comment">Summary </label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="note">Summary here (optional)</label>
                                        <textarea type="text" name="summary" id="summary" class="md-input" cols="4" rows="4"> {{ $data["summary"] }} </textarea>
                                        @if($errors->has('summary'))

                                            <span style="color:red; position: relative; right:-500px">{!!$errors->first('summary')!!}</span>

                                        @endif
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="description">Description </label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="note">Description </label>
                                        <textarea class="ckeditor" type="text" name="description" id="description" class="md-input" cols="4" rows="8"> {{ $data["description"] }}</textarea>
                                        @if($errors->has('description'))

                                            <span style="color:red; position: relative; right:-500px">{!!$errors->first('description')!!}</span>

                                        @endif
                                    </div>
                                </div>
                                <br>


                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Thumbnail Upload</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <input class="md-input" type="file" id="thumbnail" name="thumbnail">
                                        @if($errors->has('thumbnail'))

                                            <span style="color:red; position: relative; right:-500px">{!!$errors->first('thumbnail')!!}</span>

                                        @endif
                                        <a href="{!! url($data->thumbnail) !!}" download="{!! $data->thumbnail !!}" class="batch-edit"><i class="material-icons">file_download</i></a>
                                    </div>
                                </div>
                                <br>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="packages_image_1">Image 1</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <input class="md-input" type="file" id="packages_image_1" name="packages_image_1">
                                        @if($errors->has('packages_image_1'))

                                            <span style="color:red; position: relative; right:-500px">{!!$errors->first('packages_image_1')!!}</span>

                                        @endif
                                        @if($data["packages_image_1"])
                                        <a href="{!! url($data["packages_image_1"]) !!}" download="{!! $data->packages_image_1 !!}" class="batch-edit"><i class="material-icons">file_download</i></a>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="packages_image_2">Image 1</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <input class="md-input" type="file" id="packages_image_2" name="packages_image_2">
                                        @if($errors->has('packages_image_2'))

                                            <span style="color:red; position: relative; right:-500px">{!!$errors->first('packages_image_2')!!}</span>

                                        @endif
                                        @if($data["packages_image_2"])
                                        <a href="{!! url($data->packages_image_2) !!}" download="{!! $data->packages_image_2 !!}" class="batch-edit"><i class="material-icons">file_download</i></a>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="packages_image_3">Image 1</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <input class="md-input" type="file" id="packages_image_3" name="packages_image_3">
                                        @if($errors->has('packages_image_3'))

                                            <span style="color:red; position: relative; right:-500px">{!!$errors->first('packages_image_3')!!}</span>

                                        @endif
                                        @if($data["packages_image_3"])
                                        <a href="{!! url($data->packages_image_3) !!}" download="{!! $data->packages_image_3 !!}" class="batch-edit"><i class="material-icons">file_download</i></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="packages_image_4">Image 1</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <input class="md-input" type="file" id="packages_image_4" name="packages_image_4">
                                        @if($errors->has('packages_image_4'))

                                            <span style="color:red; position: relative; right:-500px">{!!$errors->first('packages_image_4')!!}</span>

                                        @endif
                                        @if($data["packages_image_4"])
                                        <a href="{!! url($data->packages_image_4) !!}" download="{!! $data->packages_image_4 !!}" class="batch-edit"><i class="material-icons">file_download</i></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Old Price</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="old_price">Old Price</label>
                                        <input class="md-input" type="text" id="old_price" name="old_price" value="{{ $data->old_price }}">
                                        @if($errors->has('old_price'))
                                            <br/>
                                            <span style="color:orangered;">{!!$errors->first('old_price')!!}</span>

                                        @endif
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">New Price</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="new_price">New Price</label>
                                        <input class="md-input" type="text" id="new_price" name="new_price" value="{{ $data->new_price }}">
                                        @if($errors->has('new_price'))
                                            <br/>
                                            <span style="color:orangered;">{!!$errors->first('new_price')!!}</span>

                                        @endif
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Discount</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="discount">Discount</label>
                                        <input class="md-input" type="text" id="discount" name="discount" value="{{ $data->discount }}">
                                        @if($errors->has('discount'))
                                            <br/>
                                            <span style="color:orangered;">{!!$errors->first('discount')!!}</span>

                                        @endif
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
        $('#sidebar_package').addClass('current_section');
    </script>

    <script src="{{ asset('assets/js/pages/components_notifications.min.js') }} "></script>
    <script src="{{ asset('bower_components/ckeditor/ckeditor.js') }} "></script>
@endsection
