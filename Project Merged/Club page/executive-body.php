
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<style>
     #ex {
        overflow: auto;
        clear: both;
        white-space: normal;
        width: 70%;
        padding-left: 5%;
        padding-right: 5%;
        margin-top: 300px;
        margin-bottom: 160px;
        margin-left: 300px;
        margin-right: 300px;
        display: flex;
        flex-flow: row;
        align-content: start;
        justify-content: space-around;
        background-color: rgb(176, 243, 176);
        height: 500px;
        transition:  5s;
        white-space: nowrap;
    }
    .card-body img:hover{
        width:350px;
        height:350px;
        transition: 2s;
    }
</style>


<script>

$(document).ready( function() {
            $.ajax({
                type: 'POST',
                url: './database/executive.php',
                data: 'id=testdata',
                dataType: 'json',
                cache: false,
                success: function(result) {
                   
                    makeDesign(result);
                },
            });
        });
    function makeDesign(exArray){
        var strID=0;
        for(var i=0;i<exArray.length;i++){
        $('#ex').append(' <div id = ex'+ strID +' class="card-body" style="width: 20000px;"></div>');
        $('#ex'+strID).append(' <img src='+'./images/'+ exArray[i]["picture"]+ ' width="100% " alt="Pro pic ">');    
        $('#ex'+strID).append(' <h5 class="card-title ">'+strID+'</h5>');
        $('#ex'+strID).append(' <p class="card-text ">'+ exArray[i]['name']+'</p>');
        strID++;
        }
    }

</script>