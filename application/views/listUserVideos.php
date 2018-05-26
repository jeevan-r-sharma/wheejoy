<!DOCTYPE html>
<html>
<body>
    <?php include('common.php'); ?>  
    <aside class="right-side">

        <section class="content-header">
            <h1>
                Videos
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li>Chapters</li>
                <li>Topics</li>
                <li class="active">Videos</li>
            </ol>
        </section>
        <aside>
            <section class="col-lg-12 connectedSortable">

                <div class="box-body table-responsive">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <div class="col-md-12 text-center"><h3></h3></div> 
                        <div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div>

                        <table aria-describedby="example2_info" id="example2" class="table table-bordered table-hover dataTable">

                            <tbody aria-relevant="all" aria-live="polite" role="alert">                                                    
                                <tr class="odd black">
                                    <td class="hide"></td>
                                    <td class="text-center" style="width: 80px;">Sl No.</td>
                                    <td class="text-center">Topic</td>
                                    <td class="text-center">Resource Name</td>
                                    <td class="text-center">Video Duration</td>
                                    <td class="text-center">View</td>
                                </tr> 

                                <?php
                                $c = count($a);
                                $i = 0;
                                if ($c > 0) {
                                    while ($i < $c) {
                                        ?>
                                        <tr class="even">												                                             
                                            <!-- <td class="hide"><?php echo $a[$i]->id; ?></td> -->
                                            <td class="text-center"><?php echo $i + 1; ?></td> 
                                            <td class="text-center"><?php echo $a[$i]->topic_name; ?></td>
                                            <td class="text-center"><?php echo $a[$i]->vidDesc; ?></td>
                                            <td class="text-center"><?php echo $a[$i]->vidDuration; ?></td>
                                            <td class="hide"><?php echo $a[$i]->videoLink; ?></td>
                                            <td class="hide"><?php echo $a[$i]->videoSource; ?></td>
                                            <td class="text-center"><a href="#" onclick="viewVideo(this)" class="btn btn-primary">Play</a> </td>


                                        </tr>
                                        <tr class="even">
                                        </tr>

                                        <?php
                                        $i++;
                                    }
                                } else {
                                    echo '<tr><td colspan="6" style="color: red;">No Records Found</td></tr>';
                                }
                                ?>
                            </tbody></table>

                        </div>
                    </div><!-- /.box-body -->
                    <!-- popup code -->
                    <div id="GSCCModalnotes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog">
                            <div class="modal-content" ><!-- style="margin-top:14%;" -->
                                <div class="modal-header">
                                    <button onclick="reloadPage();" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times; </button>
                                    <h4 class="modal-title" id="myModalLabel">Watch Video</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- <div class="pdf-view"><object type="application/pdf"  id="for_view" name="for_view"></object></div> -->
                                            <iframe src="" style="border: solid ; color: grey;background: url(<?php echo base_url(); ?>img/vimeo_player.png);" id="play" width="520" height="321" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="" onclick="reloadPage();" class="btn btn-primary pull-right" data-dismiss="modal">Close</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="hide" id="popupVideo" data-toggle='modal' data-target='#GSCCModalnotes'>View</button>
                    <!-- popup code End--> 
                </section>
            </aside>

            <!--end of popup-->  

    <script type="text/javascript">
    function viewVideo(obj)
    {
        var question_data = [];

        $(obj).closest('tr').find('td:gt(0)').each(function () {
            var textval = $(this).text(); // this will be the text of each <td>
            question_data.push(textval);
        });

        console.log("0->"+question_data[0]);
        console.log("1->"+question_data[1]);
        console.log("2->"+question_data[2]);
        console.log("3->"+question_data[3]);
        console.log("4->"+question_data[4]);
        console.log("5->"+question_data[5]);

        $("#popupVideo").click();
        var vlink1 = question_data[3];
        vlinksplit= vlink1.split('vimeo.com/');
        vlinksplit1= vlinksplit[0];
        vlinksplit2= vlinksplit[1];
        vlinksplit3= vlinksplit2.split('/');
        vlink= vlinksplit3[0];
        play.src = "https://player.vimeo.com/video/"+vlink ;
    }

    function reloadPage(){
        location.reload();
    }
    </script>                

    </body>
</html>