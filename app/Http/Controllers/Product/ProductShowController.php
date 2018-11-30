<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductShowController extends Controller
{
    public function index(Request $request)
    {
    	if(!$request->id) {
    		$product = new \StdClass;
    		$product->name = 'Acer Nitro 5 i5/ 8th Gen / 8GB/ 1TB/ 4GB Nvidia GTX Graphics 15.6" Laptop - Black';
    		$product->image = 'product_image/laptop-acer-nitro-intel-core-i7-16gb2teras4gb-gtx-1050-ti-D_NQ_NP_985244-MPE26651547660_012018-F.jpg';
    		$product->description = '<div class="html-content pdp-product-highlights" style="margin: 0px; padding: 11px 0px 16px; word-break: break-word; border-bottom: 1px solid rgb(239, 240, 245); overflow: hidden; font-family: Roboto-Regular, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 12px;"><ul class="" style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; overflow: hidden; columns: auto 2; column-gap: 32px;"><li class="" style="margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;">Brand: Acer</li><li class="" style="margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;">Model: Nitro 5</li><li class="" style="margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;">Intel Core i5 8300H CPU</li><li class="" style="margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;">8GB RAM</li><li class="" style="margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;">1TB HDD</li><li class="" style="margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;">4GB Nvidia GTX 1050</li><li class="" style="margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;">15.6" FHD (1920x1080) FHD IPS Screen</li><li class="" style="margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;">Windows 10 Genuine</li><li class="" style="margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;">backlite Keyboard</li></ul></div><div class="html-content detail-content" style="margin: 16px 0px 0px; padding: 0px 0px 16px; word-break: break-word; position: relative; height: auto; line-height: 19px; overflow-y: hidden; border-bottom: 1px solid rgb(239, 240, 245); font-family: Roboto-Regular, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif; font-size: 12px;"><p style="margin-bottom: 0px; padding: 0px; font-size: 14px;">Brand: Acer<br style="margin: 0px; padding: 0px;">Colour: Bkack<br style="margin: 0px; padding: 0px;">Screen Size: 15.6-inches<br style="margin: 0px; padding: 0px;">Resolution: 1920 x 1080 Pixels<br style="margin: 0px; padding: 0px;">Item model number: Nitro 5<br style="margin: 0px; padding: 0px;">Processor Brand: Intel<br style="margin: 0px; padding: 0px;">Processor Type: Intel Core i5 8th Gen<br style="margin: 0px; padding: 0px;">RAM Size: 8 GB<br style="margin: 0px; padding: 0px;">Memory Technology: DDR4<br style="margin: 0px; padding: 0px;">Hard Drive Size: 1 TB<br style="margin: 0px; padding: 0px;">Hard Drive Interface: SATA<br style="margin: 0px; padding: 0px;">Graphics Coprocessor:&nbsp;4GB Nvidia GTX 1050<br style="margin: 0px; padding: 0px;">Number of Audio-out Ports: 1<br style="margin: 0px; padding: 0px;">Number of USB 2.0 Ports: 2<br style="margin: 0px; padding: 0px;">Number of USB 3.0 Port: 1<br style="margin: 0px; padding: 0px;">Number of USB 3.1 Port: 1<br style="margin: 0px; padding: 0px;">HDMI: 1<br style="margin: 0px; padding: 0px;">Audio &amp; Speakers:&nbsp;mic/headphone<br style="margin: 0px; padding: 0px;">Optical Drive Type: N/A<br style="margin: 0px; padding: 0px;">SD Card Reader: Yes<br style="margin: 0px; padding: 0px;">Connectivity:&nbsp;4GB Nvidia GTX 1050<br style="margin: 0px; padding: 0px;">Battery: 48 Wh Li-ion Battery<br style="margin: 0px; padding: 0px;">Operating System: Windows 10 Genuine</p></div><div class="pdp-mod-specification" data-spm-anchor-id="a2a0e.pdp.product_detail.i2.6f4d3f9c6mDcOZ" style="margin: 16px 0px 0px; padding: 0px 0px 10px; border-bottom: 1px solid rgb(239, 240, 245); font-family: Roboto-Regular, &quot;Helvetica Neue&quot;, Helvetica, Tahoma, Arial, sans-serif;"><h2 class="pdp-mod-section-title " style="margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: Roboto-Medium; font-size: 16px; line-height: 19px; color: rgb(33, 33, 33); letter-spacing: 0px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">Specifications of Acer Nitro 5 i5/ 8th Gen / 8GB/ 1TB/ 4GB Nvidia GTX Graphics 15.6" Laptop - Black</h2><div class="pdp-general-features" style="margin: 0px; padding: 0px;"><ul class="specification-keys" style="margin: 16px -15px 0px; padding: 0px; list-style: none; height: auto;"><li class="key-li" style="margin: 0px 0px 8px; padding: 0px 15px; display: inline-block; width: 495px; vertical-align: top; line-height: 18px;"><span class="key-title" style="margin: 0px 18px 0px 0px; padding: 0px; display: inline-block; width: 140px; vertical-align: top; color: rgb(117, 117, 117); word-break: break-word; font-size: 14px;">Brand</span><div class="html-content key-value" style="margin: 0px; padding: 0px; word-break: break-word; display: inline-block; width: 306px;">Acer</div></li><li class="key-li" style="margin: 0px 0px 8px; padding: 0px 15px; display: inline-block; width: 495px; vertical-align: top; line-height: 18px;"><span class="key-title" style="margin: 0px 18px 0px 0px; padding: 0px; display: inline-block; width: 140px; vertical-align: top; color: rgb(117, 117, 117); word-break: break-word; font-size: 14px;">SKU</span><div class="html-content key-value" style="margin: 0px; padding: 0px; word-break: break-word; display: inline-block; width: 306px;">100024450_NP-1019409530</div></li><li class="key-li" style="margin: 0px 0px 8px; padding: 0px 15px; display: inline-block; width: 495px; vertical-align: top; line-height: 18px;"><span class="key-title" style="margin: 0px 18px 0px 0px; padding: 0px; display: inline-block; width: 140px; vertical-align: top; color: rgb(117, 117, 117); word-break: break-word; font-size: 14px;">Model</span><div class="html-content key-value" style="margin: 0px; padding: 0px; word-break: break-word; display: inline-block; width: 306px;">Acer AN515-53-52</div></li></ul></div><div class="box-content" style="margin: 28px 0px 0px; padding: 0px;"><span class="key-title" style="margin: 0px; padding: 0px; display: table-cell; width: 140px; color: rgb(117, 117, 117); word-break: break-word;">What’s in the box</span><div class="html-content box-content-html" style="margin: 0px; padding: 0px 0px 0px 18px; word-break: break-word; display: table-cell;">Laptop and Charger</div></div></div>';
			$product->price = 96990;
			$product->brand = 'Acer';
    	}
    	return $this->view('product.index', compact('product'));
    }
}
