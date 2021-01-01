<!DOCTYPE html>
<style>
     #right-element {
       border-left:.5px solid black;
        width: 50%;
        text-align: center;
        float: right;
    }
    #right-element button{
        margin:15px;
        text-align:center;
        font-size:50px;
        width:100px;
    }
    #UpcomingEventsAdBoard{
        text-align: center;
        background-color: rgb(176, 243, 176);
    }
</style>
<div> 
    <form >
      <input class="form-control  float-left" style="width:70%; margin-bottom:32px" type="search" placeholder="Search by event name" aria-label="Search">
      <button class="btn btn-outline-success float-right" type="submit" style="width:20%;height:80%; font-size:large ; margin-top:0px; margin-right:0px">Search</button>
    </form>
</div>
<h1>Upcomming</h1>
<div>
    <div id="UpcomingEventsAdBoard"></div>
    <div id="ok">
        <button class="btn btn-danger" value="next" onclick="adChange('UpcomingEvents',this.value)"><i class="fas fa-arrow-left"></i></button>
        <button class="btn btn-success"  id="nextUpcomingEventAd" value="previous" onclick="adChange('UpcomingEvents',this.value)"><i class="fas fa-arrow-right"></i></button>
    </div>
</div>
<script>
    $("#nextUpcomingEventAd").click();  // for auto generating a ad
</script>