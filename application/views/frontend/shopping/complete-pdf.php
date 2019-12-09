<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* customer ledger view file in pdf folder  
*/?>

<html>
    <head>
        <title><?=$student_data->student_identity.'_'.date('d_m_Y')?></title>
        <link rel="icon" href="favicon.png" sizes="32x32"/> 
        <style>
            @page { margin: 20px 20px 20px; }
            section { page-break-after: always; }
            section:last-child { page-break-after: never; }
            .title{margin:0;}
            .description{font-size: 14px}
            .heading{text-align: center;}
            #watermark { 
              top: 50%;
              left: 0;
              width: 100%; 
              margin-left:30%;
              height: auto; 
              opacity: 0.18; 
              position: fixed;
              font-size: 60px;
              -o-transform: rotate(-40deg);
              -ms-transform: rotate(-40deg);
              -moz-transform: rotate(-40deg);
              -webkit-transform: rotate(-40deg);
            }
            .bordered {
              width:100%;
              border:1px solid black;
              border-collapse: collapse;

            }
            .bordered>thead{
              border-bottom: 2px solid black;
            }
            .bordered>tfoot{
              border-top: 2px solid black;
            }
            .bordered  tr>td,
            .bordered tr>th{
              border:1px solid black;
              border-collapse: collapse;
              padding-left:2px;
              padding-right:3px;
            }
            .center{
              text-align: center;
            }
            .right{
              text-align: right;
            }
            .block{
              width:100%;
            }
            .top-table{
              width: 100%;
            }
      </style>
    </head>
    <body>
    <h1 id="watermark"><?=$student_data->student_identity.'_'.date('d_m_Y')?></h1>
    <section>
      <table class="invice-list top-table bordered">
        <thead style="background-color: gray;color:white">
          <tr>
            <td colspan="3" align="center"><h4><?=lang('student_pdf_header','CADD CORE Student Data-'.$student_data->student_identity.'-'.date('d-m-Y'));?></h4></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width="27%" rowspan="7"><img src="<?=placeholder($student_data->student_image);?>" alt="<?=$student_data->student_identity;?>" width='200' height='200'></td>
            <td width="15%" ><b><?=lang('name');?></b></td>
            <td><?=$student_data->name;?>(<?=$student_data->nickname;?>)</td>
          </tr>
          <tr>
            <td width="15%"> <b><?=lang('id_no');?></b></td>
            <td> <?=$student_data->student_identity;?></td>
          </tr>
          <tr>
            <td width="15%"><b><?=lang('mobile');?></b></td>
            <td><?=$student_data->mobile;?></td>
          </tr>
          <tr>
            <td width="15%"><b><?=lang('email');?></b></td>
            <td><?=$student_data->email;?></td>
          </tr>
          <tr>
            <td width="15%"><b><?=lang('birthday');?></b></td>
            <td><?=$student_data->name;?></td>
          </tr>
          <tr>
            <td width="15%"><b><?=lang('Student_name');?></b></td>
            <td><?=$student_data->name;?></td>
          </tr>
          <tr>
            <td width="15%"><b><?=lang('Student_name');?></b></td>
            <td><?=$student_data->name;?></td>
          </tr>
        </tbody>
      </table>
      <br>
      <table class="invice-list bordered">
        <thead style="background-color: gray;color:white">
            <tr>
               <th width="15%"><?=lang('course');?></th>
               <th width="10%"><?=lang('instractor');?></th>
               <th width="15%"><?=lang('course-duration');?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center">data</td>
                <td align="center">data</td>
                <td align="center">data</td>
            </tr>
        </tbody>
      </table>
      <br>
      <table class="block">
        <tr>
          <td width="30%" align="center"><span style="opacity:0.7;color:red;"><strong>Copyright &copy; 2016 <a href="//caddcore"> caddcore </a> </strong> All rights reserved.</span></td>
        </tr>
      </table>
    </section>
  </body>
</html>