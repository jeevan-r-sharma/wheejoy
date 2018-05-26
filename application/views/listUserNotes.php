<!DOCTYPE html>
<html>
<?php include('common.php'); ?>  
<aside class="right-side">

    <section class="content-header">
        <h1>
            Notes
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li>Chapters</li>
            <li>Topics</li>
            <li class="active">Notes</li>
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
                                <td class="text-center">Subject</td>
                                <td class="text-center">Chapter</td>
                                <td class="text-center">Topic</td>
                                <td class="text-center">Resource</td>
                                <td class="text-center">File</td>
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
                                        <td class="text-center"><?php echo $a[$i]->subject_name; ?></td>
                                        <td class="text-center"><?php echo $a[$i]->chapter_name; ?></td>
                                        <td class="text-center"><?php echo $a[$i]->topic_name; ?></td>
                                        <td class="text-center"><?php echo $a[$i]->file_name; ?></td>
                                        <td class="text-center">
                                            <a href="#" onclick="viewPdf(this)" class="btn btn-primary">View</a>
                                        </td>
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times; </button>
                        <h4 class="modal-title" id="myModalLabel">Notes</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pdf-view"><object type="application/pdf"  id="for_view" name="for_view"></object></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-primary pull-right" data-dismiss="modal">Ok</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="hide" id="popuppdf" data-toggle='modal' data-target='#GSCCModalnotes'>View</button>
        <!-- popup code End-->
    </section>
</aside>

<script>
    function viewPdf(obj)
    {
        var adminPdfPath = '<?php echo $this->config->item('adminPath'); ?>';
        adminPdfPath = adminPdfPath+"Synopsis/";
        var question_data = [];

        $(obj).closest('tr').find('td:gt(0)').each(function () {
            var textval = $(this).text(); // this will be the text of each <td>
            question_data.push(textval);
        });

        console.log(question_data[0]);
        console.log(question_data[1]);
        console.log(question_data[2]);
        console.log(question_data[3]);
        console.log(adminPdfPath);

        var path = adminPdfPath+question_data[3];

        var element = document.getElementById("for_view");
        element.setAttribute("data", path);
        $("#popuppdf").click();
        
    }
</script>            

</body>
</html>