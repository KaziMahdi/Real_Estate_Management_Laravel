@extends('layout.erp.master')


@section('content')

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->

            <!-- end page title -->
                            <section class="section">
                                <div class="section-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card" style="margin-top: 20px;" >
                                                <div class="card-header bg-light " style="height: 70px;">
                                                    <div class="w-100 d-flex justify-content-between align-items-end">
                                                        <h4 class="color-primary" >Details Clients</h4>
                                                        <a href="{{'/clients'}}" class="btn btn rounded" style="background-color:#9370DB;color:azure"><i class="fas fa-wrench mr-1"></i> Manage Client</a>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead class="border-bottom">
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name</th>
                                                                <th>Mobile</th>
                                                                <th>Email</th>                                    
                                                                <th>Description</th>
                                                                <th>Created_at</th>
                                                                <th>Updated_at</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            <tr>
                                                                <td>{{$client->id}}</td>
                                                                <td>{{$client->name}}</td>
                                                                <td>{{$client->mobile}}</td>
                                                                <td>{{$client->email}}</td>
                                                                <td>{{$client->description}}</td>                                                                
                                                                <td>{{$client->created_at}}</td>
                                                                <td>{{$client->updated_at}}</td>
                                                                
                                                               
                                                            </tr>
                                                            
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="8">
                                                                    <nav>
                                                                        <ul class="pagination">

                                                                            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                                                                <span class="page-link" aria-hidden="true">‹</span>
                                                                            </li>





                                                                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                                                            <li class="page-item"><a class="page-link" href="">2</a></li>


                                                                            <li class="page-item">
                                                                                <a class="page-link" href="" rel="next" aria-label="Next »">›</a>
                                                                            </li>
                                                                        </ul>
                                                                    </nav>
                                                                </th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
        </div>  <!-- end row-->
    </div>
</div>
         @endsection