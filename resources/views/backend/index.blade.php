

@extends('layouts.backend')

@section('content')
<h2 class="sub-header">Booking calendar</h2>

@foreach( $objects as $o=>$object )

@php ( $o++ )
<h3 class="red">{{ $object->name }} object</h3>


    @foreach( $object->rooms as $r=>$room )

    @push('scripts')
    <script>

        var eventDates = {};
        var datesConfirmed = ['12/12/2017', '12/13/2017', '12/14/2017'];
        var datesnotConfirmed = ['12/20/2017', '12/21/2017', '12/22/2017', '12/25/2017'];


        for (var i = 0; i < datesConfirmed.length; i++)
        {
            eventDates[ datesConfirmed[i] ] = 'confirmed';
        }

        var tmp = {};
        for (var i = 0; i < datesnotConfirmed.length; i++)
        {
            tmp[ datesnotConfirmed[i] ] = 'notconfirmed';
        }


        Object.assign(eventDates, tmp);


        $(function () {
            $(".reservation_calendar").datepicker({
                onSelect: function (data) {

                    //App.GetReservationData(id); /* Lecture 30 */

                    var a = $(this).attr('id');

                    $('.hidden_' + a).hide();
                    $('.loader_' + a).show();

                    setTimeout(function () {

                        $('.loader_' + a).hide();
                        $('.hidden_' + a).show();

                    }, 1000);

                },
                beforeShowDay: function (date)
                {
                    var tmp = eventDates[ $.datepicker.formatDate('mm/dd/yy', date)];
        //            console.log(tmp);
                    if (tmp)
                    {
                        if (tmp == 'confirmed')
                            return [true, 'reservationconfirmed'];
                        else
                            return [true, 'reservationnotconfirmed'];
                    } else
                        return [false, ''];

                }


            });
        });


    </script>
    @endpush

        <h4 class="blue"> Room {{ $room->room_number }}</h4>

        <div class="row top-buffer">
            <div class="col-md-3">
                <div class="reservation_calendar{{ $o.$r/}}"></div>
            </div>
            <div class="col-md-9">
                <div class="center-block loader loader_{{ $o.$r/}}" style="display: none;"></div>
                <div class="hidden_{{ $o.$r/}}" style="display: none;">


                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Room number</th>
                                    <th>Check in</th>
                                    <th>Check out</th>
                                    <th>Guest</th>
                                    @if( Auth::user()->hasRole(['admin','owner']) )
                                    <th>Confirmation</th>
                                    @endif
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td class="reservation_data_room_number"></td>
                                    <td class="reservation_data_day_in"></td>
                                    <td class="reservation_data_day_out"></td>
                                    <td><a class="reservation_data_person" target="_blank" href="">John</a></td>
                                    @if( Auth::user()->hasRole(['admin','owner']) )
                                    <td><a href="#" href="#" class="btn btn-primary btn-xs reservation_data_confirm_reservation">Confirm</a></td>
                                    @endif
                                    <td><a class="reservation_data_delete_reservation" href=""><span class="glyphicon glyphicon-remove"></span></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <hr>

    @endforeach

@endforeach
@endsection


