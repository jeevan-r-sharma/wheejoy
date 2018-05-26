<!DOCTYPE html>
<html>
<?php include('common.php'); ?>

<body onload="listChapters()">
    <aside class="right-side">
        <section class="content-header">
            <h1>
                Topics
            </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li>Chapters</li>
            <li class="active">Topics</li>
        </ol>
        </section>

        <section class="content">
            <div class="row">
                <div id="topicContent"></div>
            </div>
        </section>

    </aside>
</div>
</body>
<script type="text/javascript">
    function listChapters(){
        var topicListArray = <?php echo json_encode($topicList); ?>;
        var topicCount = topicListArray.length;
        console.log("in Onload");
        console.log(topicListArray);
        console.log("no of chaps:"+topicCount);

        for(var i=0; i<=topicCount-1; i++){
           var topicId = topicListArray[i]['topicId'];
            console.log(topicId);
            document.getElementById("topicContent").innerHTML = 
            document.getElementById("topicContent").innerHTML
            +'<div class="col-lg-3 col-xs-4 col-sm-3">'+
            '<div class="small-box bg-aqua">'+
            '<div class="inner">'+
            '<h4>'+topicListArray[i]['topicName']+'</h4>'+
            '<span style="cursor: pointer; z-index:9999" onclick="goToNotes('+topicId+')">Notes</span> | <span style="cursor: pointer; z-index:9999" onclick="goToVideos('+topicId+')">Videos</span>'+
            '</div>'+
            '</div>'+
            '</div>';
        }
}

    function goToNotes(topicId){
        location.href = '<?php echo base_url(); ?>dashboard/notes/'+topicId;
        console.log("in Notes");
        console.log(topicId);
    }
    function goToVideos(topicId){
        location.href = '<?php echo base_url(); ?>dashboard/videos/'+topicId;
        console.log("in Videos");
        console.log(topicId);
    }
    
</script>
</html>