@extends('layouts.headfoot')
@section('konten_isi')
<div class="top_agent_info">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="content-reward">
          <span class="reward_agent_title">Reward Agent</span>
          <p class="reward_agent_text">Pencapaian Agent yang berhasil melaporkan tindak penyalagunaan penggunaan Listrik</p>
        </div>
      </div>
      <div class="col-md-6">
        <img src="{{ asset('landing/images/reward_agent.png') }}" style="width:100%" alt="" srcset="">
      </div>
    </div>
  </div>
</div>

<div class="top_agent_info">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <span class="title_info">List Reward Agent</span>

        @foreach($reward as $rwd)
        @php
        $usr = $agent->where('id', $rwd->agent_id)->first();
        @endphp
        <div class="card_box_info pd_info mt-5 mb-5">
          <div class="row">
            <ul class="list_reward">
              <li class="item_reward"><strong>Tanggal : </strong><span class="item_list_reward grid_one">{{ date('d/m/Y', strtotime($rwd->created_at)) }}</span></li>
              <li class="item_reward"><strong>Nama Agent : <span class="item_list_reward grid_two">{{ '@'.$usr->username }}</span></strong></li>
              <li class="item_reward"><strong>Capaian Reward : </strong> <span class="nominal_reward grid_three">Rp. {{ number_format($rwd->nominal) }}</span> </li>
            </ul>
          </div>
        </div>
        @endforeach
        {{ $reward->links() }}   

      </div> 
      <div class="container">
        <div class="row" style="margin-top: 100px">    
          <div class="col-md-12">
            <img src="{{asset('landing/images/city_back.png')}}" alt="" srcset="" class="img_back">
          </div>
        </div>
      </div>  
    </div>
  </div>
</div>




@endsection