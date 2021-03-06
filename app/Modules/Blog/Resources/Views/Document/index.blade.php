@extends('layouts.backend.master')
@section('title', 'Document ')
@section('content')
    @include('layouts.backend.includes.notice')

    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-10-10">
                    <div class="md-card">

                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate"> Document List</span></h2>
                            </div>
                        </div>

                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                    <thead>
                                    <tr>
                                        <th>Serial</th>

                                        <th>Title</th>
                                        <th>Type </th>
                                        <th>summary </th>

                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Title</th>
                                        <th>Type </th>
                                        <th>summary </th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <?php
                                    $i=1;

                                    ?>

                                    <tbody>
                                    @foreach($data as $value)
                                        <tr>
                                            <td>{!! $i++ !!}</td>
                                            <td>{!! $value->title !!}</td>
                                            <td>{!! $value->type["title"] !!}</td>
                                            <td>{!! str_limit($value->summary,200) !!}</td>

                                            <td class="uk-text-center">
                                                @if($value->file_url)
                                                <a href="{!! url($value->file_url) !!}" download="{!! $value->title !!}" class="batch-edit"><i class="material-icons">file_download</i></a>
                                                @endif
                                                <a href="{!! route('document_edit',$value->id) !!}" class="batch-edit"><i class=" material-icons">&#xE254;</i></a>
                                                <a onclick="deleterow(this);return false;" href="{{ route('document_destroy',$value->id) }}"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="material-icons">&#xE872;</i></a>


                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->

                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="{!! route('document_create') !!}" class="md-fab md-fab-accent branch-create">
                                    <i class="material-icons">&#xE145;</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload =  function (ev) {
            $("#sidebar_package").addClass('current_section');
        }


        function deleterow(link) {

            UIkit.modal.confirm('Are you sure?', function(){
                window.location.href = link;
            });
        }




    </script>
@endsection


