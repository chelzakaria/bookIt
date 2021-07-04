@extends('layouts.app') @section('content')
<div class="container-fluid">
    <div class="row">
        @include('notes.layouts.sidebar')
        <style>
            label {
                color: #6f6d6d;
                font-weight: 600;
                font-size: 13px;
            }
        </style>
        <div class="col">
            <div class="container py-3">
                <div class="d-flex flex-row mb-3">
                    <p style="font-weight: 700; font-size: 30px;">
                        Dashboard
                    </p>
                </div>

                <hr style="border-top: 1px solid #00000023;" class="mt-0" />

                <p style="font-weight: 700; font-size: 22px;">
                    Analytics overview
                </p>
                <div class="container mr-auto ml-3 mt-4">
                    <div class="row">
                        <div class="col mr-5" style="height: 150px; border-radius: 10px; background: #dfe2fd;">
                            <div class="container py-3">
                                <div class="row mb-1"><img src="/images/icons/dashboard_note_icon.svg" alt="" /></div>
                                <div class="row mb-1 pb-0"><span style="font-weight: 700; font-size: 30px;"> {{$notes->count()}} </span></div>
                                <div class="row"><span style="font-weight: 500; font-size: 14px; color: #6f6d6d;">Notes</span></div>
                            </div>
                        </div>
                        <div class="col mr-5" style="height: 150px; border-radius: 10px; background: #FBDFDF;">
                            <div class="container py-3">
                                <div class="row mb-1"><img src="/images/icons/dashboard_book_icon.svg" alt="" /></div>
                                <div class="row mb-1 pb-0"><span style="font-weight: 700; font-size: 30px;">{{$books->count()}}</span></div>
                                <div class="row"><span style="font-weight: 500; font-size: 14px; color: #6f6d6d;">Books</span></div>
                            </div>
                        </div>
                        <div class="col mr-5" style="height: 150px; border-radius: 10px; background: #DFFBEB;">
                            <div class="container py-3">
                                <div class="row mb-1"><img src="/images/icons/dashboard_task_icon.svg" alt="" /></div>
                                <div class="row mb-1 pb-0"><span style="font-weight: 700; font-size: 30px;">{{$tasks->count()}}</span></div>
                                <div class="row"><span style="font-weight: 500; font-size: 14px; color: #6f6d6d;">Tasks</span></div>
                            </div>
                        </div>
                        <div class="col mr-5" style="height: 150px; border-radius: 10px; background: #FFFDDB;">
                            <div class="container py-3">
                                <div class="row mb-1"><img src="/images/icons/dashboard_average_icon.svg" alt="" /></div>
                                <div class="row mb-1 pb-0"><span style="font-weight: 700; font-size: 30px;">@if ($books->count())
                                    {{number_format(($notes->count()/$books->count()), 2, '.', ',')}}
                                @else
                                    0
                                @endif
                                    </span></div>
                                <div class="row"><span style="font-weight: 500; font-size: 14px; color: #6f6d6d;">Avg.of notes <br> per book </span></div>
                            </div>
                        </div>
                        <div class="col mr-5" style="height: 150px; border-radius: 10px; background: #FFFDDB;">
                            <div class="container py-3">
                                <div class="row mb-1"><img src="/images/icons/dashboard_average_icon.svg" alt="" /></div>
                                <div class="row mb-1 pb-0"><span style="font-weight: 700; font-size: 30px;"> @if ($books->count())
                                    {{number_format(($tasks->count()/$books->count()), 2, '.', ',')}}
                                @else
                                    0
                                @endif </span></div>
                                <div class="row"><span style="font-weight: 500; font-size: 14px; color: #6f6d6d;">Avg.of tasks <br> per book </span></div>
                            </div>
                        </div>
                    </div>
{{--  --}}
                    <div class="row mt-4">
                        <div class="col mr-5" style="height: 150px; border-radius: 10px; background: #dfe2fd;">
                            <div class="container py-2 pl-3 pr-2">
                                <div class="row">
                                    <div class="col">
                                         
                                    <div class="row mb-1 pb-0"><span style="font-weight: 700; font-size: 24px;">Tasks</span></div>
                                    <div class="row"><img src="/images/dashboard_tasks.svg" alt="" style="width:70%; height:auto;"></div>
                                    </div>
                                    <div class="col">
                                        <div class="row">&nbsp;</div>
                                        <div class="row mb-1 pb-0 pl-3" ><span  style="font-weight: 700; font-size: 30px;">{{$tasks->where('status', 'done')->count()}}</span></div>
                                        <div class="row"><span style="font-weight: 600; font-size: 11px; color: #6f6d6d;">Completed <br> tasks</span></div>
                                    </div>
                                    <div class="col mr-4">
                                        <div class="row">&nbsp;</div>
                                        <div class="row mb-1 pb-0 pl-4" ><span  style="font-weight: 700; font-size: 30px;">
                                            {{$tasks_count}}
                                        </span></div>
                                        <div class="row"><span style="font-weight: 600; font-size: 11px; color: #6f6d6d;">Completed tasks <br> before due date</span></div>
                                    </div>
                                    <div class="col ml-2 mr-0">
                                        <div class="row">&nbsp;</div>
                                        <div class="row mb-2 pb-0 pl-1" ><span  style="font-weight: 700; font-size: 27px;">0.72%</span></div>
                                        <div class="row"><span style="font-weight: 600; font-size: 11px; color: #6f6d6d;">Rate of completed
                                              tasks</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mr-5" style="height: 150px; border-radius: 10px; background: #FBDFDF;">
                            <div class="container py-2 pl-3 pr-2">
                                <div class="row">
                                    <div class="col mr-4">
                                         
                                    <div class="row mb-1 pb-0"><span style="font-weight: 700; font-size: 24px;">Reading</span></div>
                                    <div class="row mt-2"><img src="/images/dashboard_books.svg" alt="" style="width:80%; height:auto;"></div>
                                    </div>
                                    <div class="col">
                                        <div class="row">&nbsp;</div>
                                        <div class="row mb-1 pb-0 pl-3" ><span  style="font-weight: 700; font-size: 30px;"> {{$books->where('read', '1')->count()}} </span></div>
                                        <div class="row"><span style="font-weight: 600; font-size: 11px; color: #6f6d6d;">Books read</span></div>
                                    </div>
                                    <div class="col mr-4">
                                        <div class="row">&nbsp;</div>
                                        <div class="row mb-1 pb-0 pl-2" ><span  style="font-weight: 700; font-size: 30px;">23 <span style="font-size:25px; ">min</span></span></div>
                                        <div class="row"><span style="font-weight: 600; font-size: 11px; color: #6f6d6d;">Avg. reading time <br>
                                            per day</span></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>
                </div>
                <p style="font-weight: 700; font-size: 22px;" class="mt-4">
                    Tasks activity
                </p>
                {{--  --}}
            
                {{--  --}}
                <div class="container ">
                    <canvas class="mx-auto" id="myChart" style="width:100%;max-width:900px"></canvas>

                </div>
            </div>
        </div>
    </div>
    <script>

let tasks_histories = {!! json_encode($tasks_histories) !!};
        //  console.log(JSON.stringify({!! json_encode($tasks_histories[0]->created_at) !!}));
      let not_started = [];
      let in_progress = [];
      let done = [];

        tasks_histories.forEach(task_history => {
            
            // console.log(task_history.created_at);
            if(task_history.new_status === "not started")
            {
                not_started.push(task_history);
            }
            if(task_history.new_status === "in progress")
            {
                in_progress.push(task_history);
            }
            if(task_history.new_status === "done")
            {
                done.push(task_history);
            }

        });
        // for (let index = 0; index < not_started.length; index++) {
        //    let date = new Date(not_started[index].created_at);
        //     console.log(date + "--" +date.getDate());

        // }

            let type = 'line'

    
        let myChart = document.getElementById('myChart');
        const labels = [];

        for(let i=1; i<31; i++)
        {
            labels[i-1] = i
        }
        let data_not_started = [];  
        let data_in_progress = [];  
        let data_done = [];  

               for(let i=1; i<31; i++)
                {
                    var count =0;
                    for (let index = 0; index < not_started.length; index++) {
                    let date = new Date(not_started[index].created_at);
                        if(date.getDate()==i){
                            count++;
                        }
                        data_not_started[i-1] = count;  
                }                
                }

                for(let i=1; i<31; i++)
                {
                    var count =0;
                    for (let index = 0; index < in_progress.length; index++) {
                    let date = new Date(in_progress[index].created_at);
                        if(date.getDate()==i){
                            count++;
                        }
                        data_in_progress[i-1] = count;  
                }                
                }

                for(let i=1; i<31; i++)
                {
                    var count =0;
                    for (let index = 0; index < done.length; index++) {
                    let date = new Date(done[index].created_at);
                        if(date.getDate()==i){
                            count++;
                        }
                        data_done[i-1] = count;  
                }                
                }


            const data = {
            labels: labels,
            datasets: [{
                label: 'not started',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: data_not_started,
                tension: 0.1
            },{
                label: 'in progress',
                backgroundColor: 'rgb(25, 99, 132)',
                borderColor: 'rgb(25, 99, 132)',
                data: data_in_progress,
                tension: 0.1
            },
            {
                label: 'done',
                backgroundColor: 'rgb(6, 186, 99)',
                borderColor: 'rgb(6, 186, 99)',
                data: data_done,
                tension: 0.1
            }
            ], 
            };
   
      
      let graph = new Chart(myChart, {
        type:type,  
        data,
        options: {
        plugins: {
            title: {
                display: true,
             },
            legend: {
                display: true,
            }
        }
    }
      });
      /**************************************************/
       
    
      /**************************************************/
 
      </script>
</div>

    @endsection
    

