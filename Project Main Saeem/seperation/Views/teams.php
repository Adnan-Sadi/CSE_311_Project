<!DOCTYPE html>
<style>
    #teams li {
        list-style: none;
    }
    
    #teams li:hover {
        background: lightgreen;
    }
    
    #opl-intro,
    #pub-intro,
    #cor-intro,
    #promo-intro {
        display: none;
        margin: 30px;
    }
    
    #opl-intro img,
    #pub-intro img,
    #cor-intro img,
    #promo-intro img {
        width: 80px;
        height: 50px;
        margin-left: 50px;
        display: inline-block;
    }
    
    #opl-intro h1:hover,
    #pub-intro h1:hover,
    #cor-intro h1:hover,
    #promo-intro h1:hover {
        color: rgb(110, 185, 160);
    }
    
    #team-intro {
        margin: 40px;
        padding: 40px;
        text-align: center;
    }
    
    #team-intro button {
        width: 300px;
        height: 70px;
    }
    
    #team-intro h1:first-of-type:hover {
        color: rgb(124, 124, 233);
    }
</style>
<script>
    $(document).ready(function() {

        $("#opl-intro").slideDown();
        $("#OPL").click(function(e) {
            $("#opl-intro").slideToggle();

        });
        $("#PROMO").click(function() {
            $("#promo-intro").slideToggle();
        });
        $("#PUB").click(function() {
            $("#pub-intro").slideToggle();
            // $('.btn').click();
        });
        $("#COR").click(function() {
            $("#cor-intro").slideToggle();
        });
    });
</script>
<div id="team-intro">
    <h1 style="text-align: center; margin-bottom: 60px;" class="hover-line">Our Teams</h1>
    <ul>
        <li>
            <button id="OPL" class="btn  btn-success  ">Operation and Logistics</button>
            <button id="PROMO" class="btn btn-success ">Promotions</button>
            <button id="PUB" class="btn btn-success ">Publications</button>
            <button id="COR" class="btn btn-success ">Corporate</button>
        </li>
    </ul>
    <div id="opl-intro">
        <img src="../seperation/images/acm.png" alt="club logo">
        <h1 style="margin-left:42px;">Operation and Logistics</h1>The biggest team, Operations and Logistics ensures the smooth management and execution of NSU ACM SC's events. The vast majority of the technical expertise and manpower necessary to ensure an event is a great success
        is provided by this team, making them an essential part of NSU ACM SC and without the contributions of Logistics and Operations, no event would be a success
    </div>
    <div id="promo-intro">
        <img src="../seperation/images/acm.png" alt="club logo">
        <h1 style="margin-left:42px;">Promotions</h1>
        When there is a need for promotional materials, whether posters, graphics or videos, Promotions is at the forefront of those efforts. Promotions works closely with all other teams to create all the stunning posters and designs that represent NSU ACM SC
        on the visual field and are an essential part of an event's marketing. </div>
    <div id="pub-intro">
        <img src="../seperation/images/acm.png" alt="club logo">
        <h1 style="margin-left:42px;">Publications</h1>
        Liaising with other organizations in the digital sector of Bangladesh is the job of the corporate team. Corporate manages the funding and sponsorship necessary to organize and host events on such a large scale. Without the contributions of the corporate
        team, it would be impossible to hold events with hundreds of participants from all over the country. </div>
    <div id="cor-intro">
        <img src="../seperation/images/acm.png" alt="club logo">
        <h1 style="margin-left:42px;">Corporate</h1> Liaising with other organizations in the digital sector of Bangladesh is the job of the corporate team. Corporate manages the funding and sponsorship necessary to organize and host events on such a large scale. Without the contributions
        of the corporate team, it would be impossible to hold events with hundreds of participants from all over the country. </div>
</div>