<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    //生成pdf
    public function pdf()
    {
        $pdf = new \TCPDF();
        // 设置文档信息
        $pdf->SetCreator('懒人开发网');
        $pdf->SetAuthor('懒人开发网');
        $pdf->SetTitle('TCPDF示例');
        $pdf->SetSubject('TCPDF示例');
        $pdf->SetKeywords('TCPDF, PDF, PHP');

        // 设置页眉和页脚信息
        $pdf->SetHeaderData('tcpdf_logo.jpg', 30, 'LanRenKaiFA.com', '学会偷懒，并懒出效率！', [0, 64, 255], [0, 64, 128]);
        $pdf->setFooterData([0, 64, 0], [0, 64, 128]);

        // 设置页眉和页脚字体
        $pdf->setHeaderFont(['stsongstdlight', '', '10']);
        $pdf->setFooterFont(['helvetica', '', '8']);

        // 设置默认等宽字体
        $pdf->SetDefaultMonospacedFont('courier');

        // 设置间距
        $pdf->SetMargins(15, 15, 15);//页面间隔
        $pdf->SetHeaderMargin(5);//页眉top间隔
        $pdf->SetFooterMargin(10);//页脚bottom间隔

        // 设置分页
        $pdf->SetAutoPageBreak(true, 25);

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        //设置字体 stsongstdlight支持中文
        $pdf->SetFont('stsongstdlight', '', 14);

        //第一页
        $pdf->AddPage();
        $pdf->writeHTML('<div style="text-align: center"><h1>第一页内容</h1></div>');
        $pdf->writeHTML('<p>我是第一行内容</p>');
        $pdf->writeHTML('<p style="color: red">我是第二行内容</p>');
        $pdf->writeHTML('<p>我是第三行内容</p>');
        $pdf->Ln(5);//换行符
        $pdf->writeHTML('<p><a href="http://www.lanrenkaifa.com/" title="">懒人开发网</a></p>');

        //第二页
        $pdf->AddPage();
        $pdf->writeHTML('<h1>第二页内容</h1>');

        //输出PDF
        $pdf->Output('t.pdf', 'I');//I输出、D下载
    }
}
