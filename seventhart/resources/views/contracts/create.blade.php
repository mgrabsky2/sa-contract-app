@extends('layouts.app')

@section('title', '7th Art')

@section('content')

@if (Session::has('mssg'))
    <div class="alert alert-success">        
            <span>{{ Session::get('mssg') }}</span>        
    </div>
@endif

<div class="wrapper create-contract"> 
    <h1 align="center">Setup new Contract</h1>
    <form name="add_contract" id="add_contract" action="/contracts" method="POST">
        @csrf
        <h2><label id = 'cinema'>Cinema: <b>{{$cinemaName}}</b></label></h2>
        <div class=create-contract">
            <table id="venueDetails">
                <col width="230">
                <col width="110">
                <col width="110">
                <col width="350">

                <tr>
                    <th>Venue</th>
                    <th>Format</th>
                    <th>Language</th>
                    <th>Delivery Address</th>
                </tr>

                <tr><td>
                    <select name="venue" id="venue" class="create-contract" style="width: 230px;" multiple>
                    <option value="0">Select venue</option>
                    @foreach($venues as $venue)      
                        <option value={{ $venue->id }}>{{ $venue->name }}</option>
                    @endforeach                        
                </select></td>
                <td>
                    <select name="format" id="format" class="create-contract" style="width: 110px;">
                    @foreach($formats as $format)      
                        <option value={{ $format->id }}>{{ $format->name }}</option>
                    @endforeach                        
                </select></td>
                <td>
                    <select name="language" id="language" class="create-contract" style="width: 110px;">
                    @foreach($languages as $language)      
                        <option value={{ $language->id }}>{{ $language->name }}</option>
                    @endforeach                        
                </select></td>
                
                <td>
                    <input type="text" name="delAddr" id="delAddr"  
                        class="create-contract" style="width: 400px;"/>
                    </input>
                </td></tr>
            </table>            
            
        </div><br>

        <table id="films"> 
            <col width="450">
            <col width="125">
            <col width="165">
            <col width="165">

            <tr>
                <th>Film(s) (tick to view all)<input name="select_all" value="0" type="checkbox"></th>
                <th>No. of Screenings</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>        
            
        <tr><td>            
            <select name="filmId[]" id="filmId1" class="create-contract" style="width: 450px;"> 
                <option value="0">Select film</option>  
                @foreach($films as $film) 
                    @if( $film->inSeason == 1)     
                        <option value={{ $film->id }}>{{ $film->name }}, {{ $film->length }}' 
                            Release Date {{ $film->releaseDate }} </option>
                    @endif
                @endforeach           
            </select></td>
            
            <td>
            <select name="screenings[]" id="screenings1" class="create-contract" style="width: 70px;">
            <option value="0">TBC</option>
            @for($i = 1; $i < 10; $i++) {
                <option value={{$i}}>{{$i}}</option>
            }
            @endfor            
            </select></td>
            
            <td>
            <input type="date" id="startDate1" name="startDate[]" class="create-contract"
                value="">
            </input></td>
            <td>
            <input type="date" id="endDate1" name="endDate[]" class="create-contract"
                value="">                
            </input></td>
            </tr>
        </table>
        <br>
        <input type="hidden" id="tableRows" name="tableRows" value="1">

        <button type="button" name="add_film" id="add_film" class="btn btn-success">Add Film</button>         
         
        <br>
        <a href="{{ url('/contracts/terms') }}">View terms & conditions    </a>
        
        <input name="tAndCConfirm" id = "tAndCConfirm" value="0" type="checkbox">
        <label for="tAndCConfirm"> I confirm that I have read the terms & conditions</label><br>
               
        <input type="submit" value="Submit Contract"></input>
        <br><br>

        <div id="errordiv" class=""  style="display:none; background-color: #FFBABA;
                color: black; border: 1px solid; margin: 2px 0px; padding:5px; 
                background-position: 5px center; width: 300px;">            
            <span id="error_message" class=""></span>
            <span id="success_message" class="text-success"></span>
        </div>

        @error('venue')
            <p style="color: red">You must select a venue</p>
        @enderror 
        @error('filmId.*')
            <p style="color: red">You must select a film</p>
        @enderror 
        @error('startDate.*')
            <p style="color: red">You must enter valid start date(s)</p>
        @enderror 
        @error('endDate.*')
            <p style="color: red">You must enter valid end date(s)</p>
        @enderror       

        
        
 
    </form>
</div>

@endsection

@section('javascript')
<script type="text/javascript">    

    $(document).ready(function(){      
      var i=1;  
      var now = new Date();
      var today = now.toJSON().split('T')[0];
      var todayPlusOneYear = new Date();      
      todayPlusOneYear.setFullYear(todayPlusOneYear.getFullYear() + 1);
      var nextYear = todayPlusOneYear.toJSON().split('T')[0];        
      
      $('#add_film').click(function(){  
           i++;  
           document.getElementById("tableRows").value = i.toString();
           $('#films').append('<tr id="row'+i+'" class="dynamic-added">' + 
           '<td><select name="filmId[]" id="filmId'+i+'" style="width: 450px;" class ="create-contract">' +
           '<option value="0">Select film</option>' +
           '@foreach($films as $film) ' +
                '@if( $film->inSeason == 1)' +     
                    '<option value={{ $film->id }}>{{ $film->name }}, {{ $film->length }}' + "' " +
                            'Release Date {{ $film->releaseDate }} </option>' +
                '@endif' +
            '@endforeach' +
           '</select>' + 
           '</td><td><select name="screenings[]" id="screenings'+i+'" style="width: 70px;" class ="create-contract">' + 
           '<option value="0">TBC</option>' +
           '@for($i = 1; $i < 10; $i++) {' +
                '<option value={{$i}}>{{$i}}</option>' + 
            '}' +
            '@endfor ' +
           '</select></td>' + 
           '<td><input type="date" name="startDate[]" id="startDate'+i+'" class="create-contract" min="' + today + '" max="' + nextYear + '"></input></td>' +
           '<td><input type="date" name="endDate[]" id="endDate'+i+'" class="create-contract" min="' + today + '" max="' + nextYear + '"></input></td>' + 
           '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  

      $('#venue').change(function(){  
        var e = document.getElementById("venue");
        var venueId = e.options[e.selectedIndex].value;

        var venues = {!! json_encode($venues, JSON_PRETTY_PRINT) !!};
        var addr;
        var format;
        var language;
        for(var i = 0; i < venues.length; i++) {
            if(venues[i].id == venueId) {
                addr = venues[i].deliveryAddress;
                format = venues[i].formatId;
                //alert(format);
                language = venues[i].languageId;
                break;
            }
        }        
        document.getElementById('delAddr').value = addr;      
        document.getElementById('format').value = format;
        document.getElementById('language').value = language;    
             
      }); 

      $(function(){
        $('[type="date"]').prop('min', function(){
            return today;
        });
      });

      $(function(){
        $('[type="date"]').prop('max', function(){
            return nextYear;
        });
      });

      $('#add_contract').submit(function (e) {
        var venue = document.getElementById("venue");
        var venueId =  venue.options[venue.selectedIndex].value;
        var startDate = document.getElementById("startDate1").value;
        var endDate = document.getElementById("endDate1").value;

        var errMsg = ""; 
        var error = false;
        $('#errordiv').css('display','none');
               
        if(venueId == 0) {            
            errMsg = "You need to select a venue!";         
            error = true;
        }

        var rows = parseInt(document.getElementById("tableRows").value);
        
        var i;
        for(i = 1; i <= rows; i++ ) {
            var film = document.getElementById("filmId" + i.toString());
            var filmId =  film.options[film.selectedIndex].value;
            if(filmId == 0) {
                if(errMsg != "") errMsg = errMsg.concat("<br>");
                errMsg = errMsg.concat("You need to select a film in row " + i.toString() + "!");            
                error = true;
            }

            var startDate = document.getElementById("startDate"+ i.toString()).value;
            if(startDate == "") {
                if(errMsg != "") errMsg = errMsg.concat("<br>");
                errMsg = errMsg.concat("You need to select a start date in row " + i.toString() + "!");            
                error = true;
            }

            var endDate = document.getElementById("endDate"+ i.toString()).value;
            if(endDate == "") {
                if(errMsg != "") errMsg = errMsg.concat("<br>");
                errMsg = errMsg.concat("You need to select a end date in row " + i.toString() + "!");            
                error = true;
            }

            if(startDate != "" && endDate != "") {
                if (startDate > endDate) {
                    if(errMsg != "") errMsg = errMsg.concat("<br>");
                    errMsg = errMsg.concat("End Date must not be before start date in row " + i.toString() + " !");            
                    error = true;
                }            
            }            
        }       

        if (document.getElementById('tAndCConfirm').checked == false) {
            if(errMsg != "") errMsg = errMsg.concat("<br>");
            errMsg = errMsg.concat("You must confirm that you have read the terms & conditions!");            
            error = true;
        }           

        if(error) {
            $('#error_message').html(errMsg);  
            $('#errordiv').css('display','block');
            return false;
        }
          
        document.myform.submit();        
        
        });      
    });   
</script>

@endsection