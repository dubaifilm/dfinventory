@extends('layouts.layout')


@section('content')
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },

      initialDate: '{{ date('Y-m-d H:i:s') }}',
      businessHours: true, // display business hours
      editable: true,
      allDay:true,
      events: [
        <?php foreach ($df_diss as $df_invii): ?>
        {
          title: '{{ $df_invii->dfform }}',
          start: '{{ $df_invii->o_projdate }}',
          end: '{{ $df_invii->o_projdura }}',
          color: 'green',
          value:'{{ $df_invii->dfstatus }}'

        },
          <?php endforeach; ?>
        <?php foreach ($df_dis as $df_invi): ?>

        {

          title: '{{ $df_invi->dfform }}',
          start: '{{ $df_invi->o_projdate }}',
          end: '{{ $df_invi->o_projdura }}',
          color: 'red',
          value:'{{ $df_invi->dfstatus }}'
        },
          <?php endforeach; ?>

      ],
      eventClick: function(info){
        sx = 'mjtogglesideee' + info.event.title;
        document.getElementById(sx).className = 'mj-toggleside mj-togglesideshow';
        document.getElementById('mjbodytoggle').className = 'mj-body mj-border badge-dark mj-bodytoggle';
        info.el.style.borderColor = '#fff';
        info.jsEvent.preventDefault();

            <?php $mjtogg = 'Unavailable'; ?>

      }

    });

    calendar.render();

  });

</script>
<div id="mjbodytoggle" class="mj-body mj-border badge-dark">
<div class="container">
  <div class="row badge-dark">
    <div class="col-md-2  mj-margin-top">
      <label for=""><i class="fa fa-stop mj-blue" aria-hidden="true"></i>&nbsp;Today</label><br/>
      <label for=""><i class="fa fa-stop mj-red" aria-hidden="true"></i>&nbsp;Check-Out Projects</label><br/>
      <label for=""><i class="fa fa-stop mj-green" aria-hidden="true"></i>&nbsp;Check-In Projects</label>
    </div>
    <div class="col-md-10">

        <div id='calendar'></div>
    </div>

  </div>
  </div>


  <p style="margin:3rem">&nbsp;</p>
</div>
  @include('layouts.mjmodal')

  <?php foreach ($df_invin as $df_invi): ?>
    @php
    $df_item = DB::select('select * from df_checkouts where dfform = ?',[$df_invi->dfform]);
    $df_itemdd = DB::select('select * from df_checkins where dfform = ?',[$df_invi->dfform]);
    @endphp
  <div id="mjtogglesideee{{ $df_invi->dfform }}" class="mj-toggleside" >
    <div class="container" style="  margin-top: 2rem;">
      <h1>{{ $df_invi->dfform }}</h1>

      <div class="row">
        <div class="col-4">
          <label for="" class="form-label">CheckOut</label>
            </div>
          <div class="col-8">
              <input type="text" class="form-control" name="" value="{{ $df_invi->created_at }}">
          </div>
        <div class="col-4">
          <label for="" class="form-label">Project Day</label>
            </div>
          <div class="col-8">
              <input type="text" class="form-control" name="" value="{{ $df_invi->o_projdate }} to {{ $df_invi->o_projdura }} ( Year - Month - Day)">
          </div>
        <div class="col-4">
          <label for="" class="form-label">Project Name</label>
            </div>
          <div class="col-8">
              <input type="text" class="form-control" name="" value="{{ $df_invi->o_projname }}">
          </div>
        <div class="col-4">
          <label for="" class="form-label">Recipient</label>
            </div>
          <div class="col-8">
              <input type="text" class="form-control" name="" value="{{ $df_invi->o_name }}">
          </div>
        <div class="col-4">
          <label for="" class="form-label">Company ID</label>
            </div>
          <div class="col-8">
              <input type="text" class="form-control" name="" value="{{ $df_invi->o_companyid }}">
          </div>

        <div class="col-4">
          <label for="" class="form-label">Equipments</label>
            </div>
          <div class="col-8">
            <form method="POST" action="/chartinpost/{{ $df_invi->dfform}}" style="width:100%" >
              @csrf
                  <?php if ($mjtogg == 'Unavailable'): ?>
                    <?php foreach ($df_itemdd as $df_itemddd): ?>
                      <div class="d-flex justify-content" style="margin-bottom:10px;margin-top:10px;">
                        <img src="/img/equipments/{{ $df_itemddd->dfproductimg }}" style="border-radius: 20px;width:120px;height:auto;">
                        <ul class="mj-hide-dots text-left">

                            <li><label class="form-label">{{$df_itemddd->dfitem}}</label> </li>
                            <li><label class=""><i class="fa fa-square" aria-hidden="true">&nbsp;</i>{{$df_itemddd->dfserial}}</label> </li>
                          <li>  <input type="text" class="form-control grid-item" name="dfrem{{$df_itemddd->dfserial}}" value="{{$df_itemddd->dfremarks}}" disabled/></li>
                        </ul>
                      </div>
                    <?php endforeach; ?>
                      <?php foreach ($df_item as $df_items): ?>
                        <div class="d-flex justify-content" style="margin-bottom:10px;margin-top:10px;">
                          <img src="/img/equipments/{{ $df_items->dfproductimg }}" style="border-radius: 20px;width:120px;height:auto;">
                          <ul class="mj-hide-dots text-left">
                            <li><label class="form-label">{{$df_items->dfitem}}</label> </li>
                            <li><div class="custom-control custom-checkbox">
                              <input type="checkbox" name="df{{$df_items->dfserial}}" value="{{$df_items->dfserial}}" class="custom-control-input" id="customCheck{{$df_items->id}}">
                              <label class="custom-control-label" for="customCheck{{$df_items->id}}">{{$df_items->dfserial}}</label>
                            </div> </li>
                            <li>  <input type="text" class="form-control grid-item" name="dfrem{{$df_items->dfserial}}" value="{{$df_items->dfremarks}}"></li>
                          </ul>
                        </div>

                      <?php endforeach; ?>
                  <?php elseif($mjtogg == 'Available'): ?>
                      <?php foreach ($df_itemdd as $df_itemddd): ?>
                        <div class="d-flex justify-content" style="margin-bottom:10px;margin-top:10px;">
                          <img src="/img/equipments/{{ $df_itemddd->dfproductimg }}" style="border-radius: 20px;width:120px;height:auto;">
                          <ul class="mj-hide-dots text-left">

                              <li><label class="form-label">{{$df_itemddd->dfitem}}</label> </li>
                              <li><label class=""><i class="fa fa-square" aria-hidden="true">&nbsp;</i>{{$df_itemddd->dfserial}}</label> </li>
                            <li>  <input type="text" class="form-control grid-item" name="dfrem{{$df_itemddd->dfserial}}" value="{{$df_itemddd->dfremarks}}" disabled/></li>
                          </ul>
                        </div>
                      <?php endforeach; ?>
                      <?php foreach ($df_item as $df_items): ?>
                        <div class="d-flex justify-content" style="margin-bottom:10px;margin-top:10px;">
                          <img src="/img/equipments/{{ $df_items->dfproductimg }}" style="border-radius: 20px;width:120px;height:auto;">
                          <ul class="mj-hide-dots text-left">
                            <li><label class="form-label">{{$df_items->dfitem}}</label> </li>
                            <li><div class="custom-control custom-checkbox">
                              <input type="checkbox" name="df{{$df_items->dfserial}}" value="{{$df_items->dfserial}}" class="custom-control-input" id="customCheck{{$df_items->id}}">
                              <label class="custom-control-label" for="customCheck{{$df_items->id}}">{{$df_items->dfserial}}</label>
                            </div> </li>
                            <li>  <input type="text" class="form-control grid-item" name="dfrem{{$df_items->dfserial}}" value="{{$df_items->dfremarks}}"></li>
                          </ul>
                        </div>

                      <?php endforeach; ?>
                  <?php endif; ?>
                  </form>
          </div>
  <div class='container'>
      <div class="d-flex justify-content-center">
            @php
             $subfile = unserialize($df_invi->o_subfile);
             $directory = "/img/checkout/".$df_invi->dfform."/";
             for( $i=0 ; $i < count($subfile) ; $i++ ){
               echo "<img src='".$directory.basename($subfile[$i])."'  class='subfileimg'>";
             }
             @endphp
           </div>
             <ul class="d-flex justify-content-center">
             <?php foreach ($df_invi->o_subf as $df_dfsubf): ?>
            <li class="mj-list">{{($df_dfsubf)}}</li>
             <?php endforeach; ?>
              </ul>
  </div>
      </div>
    </div>
  </div>

  <?php endforeach; ?>

@endsection
