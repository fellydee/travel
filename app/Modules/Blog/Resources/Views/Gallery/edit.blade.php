@extends('layouts.backend.master')

@section('title', 'Gallery ')



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
            {!! Form::open(['url' => route("gallery_update",$data->id), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']) !!}
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">edit Blog</span></h2>
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
                                        <label for="contact_category_id" class="uk-vertical-align-middle">Type <i style="color:red" class="material-icons">stars</i></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <select id="contact_category_id" name="gallery_type_id" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" required>
                                            <option value="">Select Type</option>
                                            @foreach($service as $value)
                                                @if($value->id==$data->id)
                                                <option value="{{ $value->id }}" selected>{{ $value->title }}</option>
                                                @else
                                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
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
                                        <input class="md-input" type="text" id="title" value="{{ $data->title }}" name="title">
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
                                        <textarea type="text" name="summary" id="summary" class="md-input" cols="4" rows="4">{{ $data->summary }}</textarea>
                                        @if($errors->has('summary'))

                                            <span style="color:red; position: relative; right:-500px">{!!$errors->first('summary')!!}</span>

                                        @endif
                                    </div>
                                </div>
                                <br>
                                <br>



                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">file Upload</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <input class="md-input" type="file" id="thumbnail" name="thumbnail">
                                        @if($errors->has('thumbnail'))

                                            <span style="color:red; position: relative; right:-500px">{!!$errors->first('thumbnail')!!}</span>

                                        @endif
                                      @if($data->image_url)
                                         <img src="{{ url($data->image_url) }}" width="250" height="250"/>
                                       @endif
                                    </div>
                                </div>
                                <br>




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
