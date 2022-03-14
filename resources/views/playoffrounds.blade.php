@extends('layout')

@php

  if(isset($season['Year']))
    $year = $season['Year'];
  else
    $year = $seasons[0]->Season;

@endphp

@section('title')
{{$year}} NBA playoffs - {{ config('app.name') }} 
@endsection

@section('description')
Cuadro de playoffs del año {{$year}} de {{ config('app.name') }}.
@endsection

@section('javascript')
<script>
  function changeSeason(value){
    window.location.href = "{{route('playoffrounds.index')}}" + "/" +value;
  }
</script>
@endsection

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script|Herr+Von+Muellerhoff' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Istok+Web|Roboto+Condensed:700' rel='stylesheet' type='text/css'>

<style>
body {
  font-family: "Istok Web", sans-serif;
  background: url("http://picjumbo.com/wp-content/uploads/HNCK2189-1300x866.jpg")
    no-repeat;
  background-size: cover;
  min-height: 100%;
  margin: 0;
}

#bracket {
  overflow: hidden;
  background-color: #e1e1e1;
  background-color: rgba(225, 225, 225, 0.9);
  padding-top: 20px;
  font-size: 12px;
  padding: 40px 0;
}
.container {
  max-width: 1100px;
  margin: 0 auto;
  display: block;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: -webkit-flex;
  display: flex;
  -webkit-flex-direction: row;
  flex-direction: row;
}
.split {
  display: block;
  float: left;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  width: 42%;
  -webkit-flex-direction: row;
  -moz-flex-direction: row;
  flex-direction: row;
}
.champion {
  float: left;
  display: block;
  width: 16%;
  -webkit-flex-direction: row;
  flex-direction: row;
  -webkit-align-self: center;
  align-self: center;
  margin-top: -15px;
  text-align: center;
  padding: 230px 0\9;
}
.champion i {
  color: #a0a6a8;
  font-size: 45px;
  padding: 10px 0;
}
.round {
  display: block;
  float: left;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -webkit-flex-direction: column;
  flex-direction: column;
  width: 95%;
  width: 30.8333%\9;
}

.split-one .round {
  margin: 0 2.5% 0 0;
}
.split-two .round {
  margin: 0 0 0 2.5%;
}
.matchup {
  margin: 20;
  width: 100%;
  padding: 10px 0;
  height: 60px;
  -webkit-transition: all 0.2s;
  transition: all 0.2s;
}
.points {
  font-size: 11px;
  text-transform: uppercase;
  float: right;
  color: #2c7399;
  font-weight: bold;
  font-family: "Roboto Condensed", sans-serif;
  position: absolute;
  right: 5px;
}
.team {
  padding: 0 5px;
  margin: 3px 0;
  height: 25px;
  line-height: 25px;
  font-size: 0.85em;
  white-space: nowrap;
  overflow: hidden;
  position: relative;
}
.round-two .matchup {
  margin: 20;
  height: 60px;
  padding: 50px 0;
}
.round-three .matchup {
  margin: 20;
  height: 60px;
  padding: 130px 0;
}
.round-details {
  font-family: "Roboto Condensed", sans-serif;
  font-size: 13px;
  color: #2c7399;
  text-transform: uppercase;
  text-align: center;
  height: 40px;
}
.champion li,
.round li {
  background-color: #fff;
  box-shadow: none;
  opacity: 1;
}
.current li {
  opacity: 1;
}
.current li.team {
  background-color: #fff;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
  opacity: 1;
}
.vote-options {
  display: block;
  height: 52px;
}

.final {
  margin: 4.5em 0;
}

@-webkit-keyframes pulse {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }

  50% {
    -webkit-transform: scale(1.3);
    transform: scale(1.3);
  }

  100% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}

@keyframes pulse {
  0% {
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
  }

  50% {
    -webkit-transform: scale(1.3);
    -ms-transform: scale(1.3);
    transform: scale(1.3);
  }

  100% {
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
  }
}

.date {
  font-size: 10px;
  letter-spacing: 2px;
  font-family: "Istok Web", sans-serif;
  color: #3f915f;
}

@media screen and (min-width: 981px) and (max-width: 1099px) {
  .container {
    margin: 0 1%;
  }
  .champion {
    width: 14%;
  }
  .split {
    width: 43%;
  }
  .split-one .vote-box {
    margin-left: 138px;
  }

}

@media screen and (max-width: 980px) {
  .container {
    -webkit-flex-direction: column;
    -moz-flex-direction: column;
    flex-direction: column;
  }
  .split,
  .champion {
    width: 90%;
    margin: 35px 5%;
  }
  .champion {
    -webkit-box-ordinal-group: 3;
    -moz-box-ordinal-group: 3;
    -ms-flex-order: 3;
    -webkit-order: 3;
    order: 3;
  }
  .split {
    border-bottom: 1px solid #b6b6b6;
    padding-bottom: 20px;
  }

}

@media screen and (max-width: 400px) {
  .split {
    width: 95%;
    margin: 25px 2.5%;
  }
  .round {
    width: 21%;
  }
  .current {
    -webkit-flex-grow: 1;
    -moz-flex-grow: 1;
    flex-grow: 1;
  }

}

</style>

@endsection

@section('section')

<section class="normal"> 
  <h1>{{$year}} NBA Playoffs</h1>

  <label for="Season">Select season: </label>
  <select name="Season" onchange=
  "changeSeason(this.value)">

@foreach($seasons as $season)
  @if($year == $season->Season)
  <option selected value="{{$season->Season}}">{{$season->Season}}</option>

  @else
  <option value="{{$season->Season}}">{{$season->Season}}</option>
  @endif

@endforeach
</select>

<div class="container">
	<div class="split split-one">
		<div class="round round-one current">
			<div class="round-details">Round 1</div>
			<ul class="matchup">
				<li class="team team-top">{{$r1w[0]->HomeSeed}}. 
                    {{$r1w[0]->hometeam->CityName}} 
                    <span class="points">{{$r1w[0]->HomeWins}} </span></li>
				<li class="team team-bottom">{{$r1w[0]->AwaySeed}}. 
                    {{$r1w[0]->awayteam->CityName}}
                    <span class="points">{{$r1w[0]->AwayWins}} </span></li>
			</ul>		
			<ul class="matchup">
				<li class="team team-top">{{$r1w[1]->HomeSeed}}. 
                    {{$r1w[1]->hometeam->CityName}} 
                    <span class="points">{{$r1w[1]->HomeWins}} </span></li>
				<li class="team team-bottom">{{$r1w[1]->AwaySeed}}. 
                    {{$r1w[1]->awayteam->CityName}}
                    <span class="points">{{$r1w[1]->AwayWins}} </span></li>
			</ul>
			<ul class="matchup">
				<li class="team team-top">{{$r1w[2]->HomeSeed}}. 
                    {{$r1w[2]->hometeam->CityName}} 
                    <span class="points">{{$r1w[2]->HomeWins}} </span></li>
				<li class="team team-bottom">{{$r1w[2]->AwaySeed}}. 
                    {{$r1w[2]->awayteam->CityName}}
                    <span class="points">{{$r1w[2]->AwayWins}} </span></li>
			</ul>
			<ul class="matchup">
				<li class="team team-top">{{$r1w[3]->HomeSeed}}. 
                    {{$r1w[3]->hometeam->CityName}} 
                    <span class="points">{{$r1w[3]->HomeWins}} </span></li>
				<li class="team team-bottom">{{$r1w[3]->AwaySeed}}. 
                    {{$r1w[3]->awayteam->CityName}}
                    <span class="points">{{$r1w[3]->AwayWins}} </span></li>
			</ul>											
		</div>	<!-- END ROUND ONE -->

		<div class="round round-two">
			<div class="round-details">Round 2</div>			
			<ul class="matchup">
				<li class="team team-top">{{$r2w[0]->HomeSeed}}. 
                    {{$r2w[0]->hometeam->CityName}} 
                    <span class="points">{{$r2w[0]->HomeWins}} </span></li>
				<li class="team team-bottom">{{$r2w[0]->AwaySeed}}. 
                    {{$r2w[0]->awayteam->CityName}}
                    <span class="points">{{$r2w[0]->AwayWins}} </span></li>
			</ul>		
			<ul class="matchup">
				<li class="team team-top">{{$r2w[1]->HomeSeed}}. 
                    {{$r2w[1]->hometeam->CityName}} 
                    <span class="points">{{$r2w[1]->HomeWins}} </span></li>
				<li class="team team-bottom">{{$r2w[1]->AwaySeed}}. 
                    {{$r2w[1]->awayteam->CityName}}
                    <span class="points">{{$r2w[1]->AwayWins}} </span></li>
			</ul>									
		</div>	<!-- END ROUND TWO -->
		
		<div class="round round-three">
			<div class="round-details">Round 3</div>			
			<ul class="matchup">
				<li class="team team-top">{{$r3w[0]->HomeSeed}}. 
                    {{$r3w[0]->hometeam->CityName}} 
                    <span class="points">{{$r3w[0]->HomeWins}} </span></li>
				<li class="team team-bottom">{{$r3w[0]->AwaySeed}}. 
                    {{$r3w[0]->awayteam->CityName}}
                    <span class="points">{{$r3w[0]->AwayWins}} </span></li>
			</ul>										
		</div>	<!-- END ROUND THREE -->		
	</div> 

<div class="champion">
		<div class="final">
			<i class="fa fa-trophy"></i>
			<div class="round-details">championship</div>		
			<ul class="matchup champioship">
				<li class="team team-top">{{$final[0]->HomeSeed}}. 
                    {{$final[0]->hometeam->CityName}} 
                    <span class="points">{{$final[0]->HomeWins}} </span></li>
				<li class="team team-bottom">{{$final[0]->AwaySeed}}. 
                    {{$final[0]->awayteam->CityName}}
                    <span class="points">{{$final[0]->AwayWins}} </span></li>
			</ul>		
		</div>
	</div>


	<div class="split split-two">


		<div class="round round-three">
			<div class="round-details">Round 3</div>						
			<ul class="matchup">
				<li class="team team-top">{{$r3e[0]->HomeSeed}}. 
                    {{$r3e[0]->hometeam->CityName}} 
                    <span class="points">{{$r3e[0]->HomeWins}} </span></li>
				<li class="team team-bottom">{{$r3e[0]->AwaySeed}}. 
                    {{$r3e[0]->awayteam->CityName}}
                    <span class="points">{{$r3e[0]->AwayWins}} </span></li>
			</ul>										
		</div>	<!-- END ROUND THREE -->	

		<div class="round round-two">
			<div class="round-details">Round 2</div>						
			<ul class="matchup">
				<li class="team team-top">{{$r2e[0]->HomeSeed}}. 
                    {{$r2e[0]->hometeam->CityName}} 
                    <span class="points">{{$r2e[0]->HomeWins}} </span></li>
				<li class="team team-bottom">{{$r2e[0]->AwaySeed}}. 
                    {{$r2e[0]->awayteam->CityName}}
                    <span class="points">{{$r2e[0]->AwayWins}} </span></li>
			</ul>		
			<ul class="matchup">
				<li class="team team-top">{{$r2e[1]->HomeSeed}}. 
                    {{$r2e[1]->hometeam->CityName}} 
                    <span class="points">{{$r2e[1]->HomeWins}} </span></li>
				<li class="team team-bottom">{{$r2e[1]->AwaySeed}}. 
                    {{$r2e[1]->awayteam->CityName}}
                    <span class="points">{{$r2e[1]->AwayWins}} </span></li>
			</ul>									
		</div>	<!-- END ROUND TWO -->
 		<div class="round round-one current">
			<div class="round-details">Round 1</div>
			<ul class="matchup">
				<li class="team team-top">{{$r1e[0]->HomeSeed}}. 
                    {{$r1e[0]->hometeam->CityName}} 
                    <span class="points">{{$r1e[0]->HomeWins}} </span></li>
				<li class="team team-bottom">{{$r1e[0]->AwaySeed}}. 
                    {{$r1e[0]->awayteam->CityName}}
                    <span class="points">{{$r1e[0]->AwayWins}} </span></li>
			</ul>		
			<ul class="matchup">
				<li class="team team-top">{{$r1e[1]->HomeSeed}}. 
                    {{$r1e[1]->hometeam->CityName}} 
                    <span class="points">{{$r1e[1]->HomeWins}} </span></li>
				<li class="team team-bottom">{{$r1e[1]->AwaySeed}}. 
                    {{$r1e[1]->awayteam->CityName}}
                    <span class="points">{{$r1e[1]->AwayWins}} </span></li>
			</ul>
			<ul class="matchup">
				<li class="team team-top">{{$r1e[2]->HomeSeed}}. 
                    {{$r1e[2]->hometeam->CityName}} 
                    <span class="points">{{$r1e[2]->HomeWins}} </span></li>
				<li class="team team-bottom">{{$r1e[2]->AwaySeed}}. 
                    {{$r1e[2]->awayteam->CityName}}
                    <span class="points">{{$r1e[2]->AwayWins}} </span></li>
			</ul>
			<ul class="matchup">
				<li class="team team-top">{{$r1e[3]->HomeSeed}}. 
                    {{$r1e[3]->hometeam->CityName}} 
                    <span class="points">{{$r1e[3]->HomeWins}} </span></li>
				<li class="team team-bottom">{{$r1e[3]->AwaySeed}}. 
                    {{$r1e[3]->awayteam->CityName}}
                    <span class="points">{{$r1e[3]->AwayWins}} </span></li>
			</ul>												
		</div>	<!-- END ROUND ONE -->          				
	</div>
	</div>
  
  <div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;">
  <div class="card-header">{{$year}} NBA Champions</div>
  <div class="card-body text-dark">
    @if($final[0]->HomeWins == 4)
    <h5 class="card-title">{{$final[0]->hometeam->CityName}} {{$final[0]->hometeam->TeamName}}</h5>
    <p class="card-text">{{$final[0]->hometeam->CityName}} {{$final[0]->hometeam->TeamName}} 
      proclaimed NBA champion after defeating {{$final[0]->awayteam->CityName}} {{$final[0]->awayteam->TeamName}} 
      {{$final[0]->HomeWins}}-{{$final[0]->AwayWins}}
    </p>
    @else
    <h5 class="card-title">{{$final[0]->awayteam->CityName}} {{$final[0]->awayteam->TeamName}}</h5>
    <p class="card-text">{{$final[0]->awayteam->CityName}} {{$final[0]->awayteam->TeamName}} 
      proclaimed NBA champion after defeating {{$final[0]->hometeam->CityName}} {{$final[0]->hometeam->TeamName}} 
      {{$final[0]->HomeWins}}-{{$final[0]->AwayWins}}
    </p>
    @endif
  </div>
</div>

  <div>
    <p><a href="https://codepen.io/jbeason/pen/Wbaedb">Flexbox Madness</a> by <a href="https://codepen.io/jbeason">Joe Beason</a></p>
  </div>
</section>

@endsection







