@extends('layouts.admin')
@section('content')
    <h3 class="page-title">{{ trans('global.systemCalendar') }}</h3>
    <div class="card">
        <div class="card-header">
            {{ trans('global.systemCalendar') }}
        </div>

        <div class="card-body bg-dark">
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card-body bg-white">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
    @parent
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            events = {!! json_encode($events) !!};
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events: events,
                eventAfterRender: function(event, element, view) {
                    var eventTitle = element.find('.fc-title');
                    var eventWidth = eventTitle.width() +
                    5; // Menambahkan margin untuk memperhitungkan ruang kosong

                    element.css('width', eventWidth + 'px');
                },

            })
        });
    </script>
@stop
