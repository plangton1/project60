<?php
$html = ob_get_contents();
// $html = '<h1 class="app-page-title text-end">รายงานเอกสาร / Report</h1> <div class="container"> <h5>สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย 35 เทคโนธานี <h5> <h5>ถนนเลียบคลองห้า ตำบลคลองห้า อำเภอคลองหลวง จังหวัดปทุมธานี 12120</h5> <hr> <p class="justify-content-right" style="font-size: 18px;"> <!-- <p align=end>01/11/2022</p><p align=end>เวลา 12:55:24</p> --> <tr><td width=\'85\' valign=\'top\'><b>หมายเลขเอกสาร : </b></td><td width=\'279\'>1242</td><hr width=\'200\'></tr><tr><td width=\'85\' valign=\'top\'><b>ชื่อเอกสาร :</b></td><td width=\'279\'>มอก 1</td><br style=\'line-height: 18pt\'></tr><tr><td valign=\'top\'><b>วันที่เพิ่ม :</b></td><td>15 ธันวาคม 2564</td></tr><br><br><hr> <table class="table table-responsive-xl table-striped text-center pt-5" style="background-color: white;" id="tableall"> <thead> <tr> <th class="col-2">วันที่เพิ่มเอกสาร</th> <th class="col-2">วาระจากในที่ประชุมสมอ.</th> <th class="col-1">เลขที่มอก.</th> <th class="col-1">ชื่อมาตรฐาน</th> <th class="col-2">วันที่แต่งตั้งสถานะ</th> <!-- <th class="col-1">เลขที่เอกสาร</th> --> <th class="col-2">สถานะ</th> </tr> </thead> <tbody> <td class="align-middle">12/15/2021</td> <td class="align-middle">มอก. 44-2560</td> <td class="align-middle">-</td> <td class="align-middle">มอก 1</td> <td class="align-middle">31 มกราคม 2565</td> <td class="align-middle text-lighred" style="background-color: #5F9EA0"> ส่งเอกสารออกไปสมอ. </td> </tr> </tbody> </table>';
// echo htmlspecialchars($html);
$mpdf->WriteHTML($html);
$mpdf->Output("Report_PDF.pdf");
ob_end_flush();
?>