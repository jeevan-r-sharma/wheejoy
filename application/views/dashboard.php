<!DOCTYPE html>
<html>
<?php include('common.php'); ?>

<body onload="getDashboardSubject()">
    <aside class="right-side">
        <section class="content-header">
            <h1>
                Dashboard
            </h1>
            <ol class="breadcrumb">
                <li class="active"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>

            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div id="subjectContent"></div>
            </div>
        </section>

    </aside>
</div>
</body>
<script type="text/javascript">
    function getDashboardSubject(){
        var subListArray = <?php echo json_encode($dashboardSub); ?>;
        var subCount = subListArray.length;
        console.log("in Onload");
        console.log(subListArray);
        console.log("no of subjs:"+subCount);

        for(var i=0; i<=subCount-1; i++){
            subjectId = subListArray[i]['subject_id'];
            console.log(subjectId);
            document.getElementById("subjectContent").innerHTML = 
            document.getElementById("subjectContent").innerHTML
            +'<div class="col-lg-3 col-xs-4 col-sm-3">'+
            '<div class="small-box bg-aqua" style="cursor: pointer; z-index:9999" onclick="goToContents('+subjectId+')">'+
            '<div class="inner">'+
            '<h3>'+subListArray[i]['subject_name']+'</h3>'+
            '<h6>Chpters:'+subListArray[i]['chap_count']+'</h6>'+
            '<h6>Topics: '+subListArray[i]['topic_count']+'</h6>'+
            '<h6>Videos: '+subListArray[i]['video_count']+'</h6>'+
            '<h6>Video Duration: '+subListArray[i]['vduration_count']+'</h6>'+
            '</div>'+
            '</div>'+
            '</div>';
        }
}

    function goToContents(subId){
        location.href = '<?php echo base_url(); ?>dashboard/subjectContents/'+subId;
        console.log(subId);
    }
</script>
</html>