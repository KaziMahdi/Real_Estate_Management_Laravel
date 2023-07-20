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
                                                        <h4 class="color-primary" >Details Task</h4>
                                                        <a href="{{'/tasks'}}" class="btn btn rounded" style="background-color:#9370DB;color:azure"><i class="fas fa-wrench mr-1"></i> Manage Task</a>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead class="border-bottom">
                                                            <tr>
                                                                <th>Id</th>                                                                
                                                                <th>Project Task</th>
                                                                <th>Employee</th>
                                                                <th>Project</th>                                                                 
                                                                <th>Start Time</th>                                                                 
                                                                <th>End Time</th>                                                                 
                                                                <th>Location</th>                                    
                                                                <th>Status</th>                                    
                                                                <th>Created at</th>                                    
                                                                <th>Updated at</th>                                    
                                                                
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        
                                                            <tr>
                                                                
                                                                <td>{{$task->id}}</td>
                                                                <td>{{$task->ptask}}</td>
                                                                <td>{{$task->em}}</td>
                                                                <td>{{$task->pro}}</td>                                                                                                                              
                                                                <td>{{$task->start_time}}</td>                                                                                                                              
                                                                <td>{{$task->end_time}}</td>                                                                                                                              
                                                                <td>{{$task->location}}</td>
                                                                <td>{{$task->status}}</td>
                                                                <td>{{$task->created_at}}</td>
                                                                <td>{{$task->updated_at}}</td>
                                                                
                                                               
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