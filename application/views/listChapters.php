<!DOCTYPE html>
<html>
<?php include('common.php'); ?>

<body onload="listChapters()">
    <aside class="right-side">
        <section class="content-header">
            <h1>
                Chapters
            </h1>
            <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Chapters</li>
        </ol>
        </section>

        <section class="content">
            <div class="row">
                <div id="chapterContent"></div>
            </div>
        </section>

    </aside>
</div>
</body>
<script type="text/javascript">
    function listChapters(){
        var chapListArray = <?php echo json_encode($chaptersList); ?>;
        var chapCount = chapListArray.length;
        console.log("in Onload");
        console.log(chapListArray);
        console.log("no of chaps:"+chapCount);

        for(var i=0; i<=chapCount-1; i++){
            chapterId = chapListArray[i]['chapter_id'];
            console.log(chapterId);
            document.getElementById("chapterContent").innerHTML = 
            document.getElementById("chapterContent").innerHTML
            +'<div class="col-lg-3 col-xs-4 col-sm-3">'+
            '<div class="small-box bg-aqua style="background-color: #d22f0da3 !important;">'+
            '<div class="inner">'+
            '<h4>'+chapListArray[i]['chapter_name']+'</h4>'+
            '<span style="cursor: pointer; z-index:9999" onclick="listQuesSet('+chapterId+')">Test</span> | <span style="cursor: pointer; z-index:9999" onclick="listTopics('+chapterId+')">Study</span>'+
            '</div>'+
            '</div>'+
            '</div>';
        }
}

    function listQuesSet(chapterId){
        location.href = '<?php echo base_url(); ?>dashboard/quesSet/'+chapterId;
        console.log("in listQuesSet");
        console.log(chapterId);
    }
    function listTopics(chapterId){
        location.href = '<?php echo base_url(); ?>dashboard/chapterContents/'+chapterId;
        console.log("in listTopics");
        console.log(chapterId);
    }
    
</script>
</html>