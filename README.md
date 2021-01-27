<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 關於本教學範例

你是正在入門的Laravel新手還是還是喜愛VUE開發的前端工程師?
你是否有實作後台功能的問題需要解決呢?
我正準備製作一支影片來解決你們的問題，而且一點都不難!

這影片將教會你
如何將前端套版檔案導入Laravel專案中
如何將資料從後台抓出後送至前台
如何自動生成後台介面
如何動態從後台管理選單
如何動態從後台管理設定

仍在Laravel入門的你，將不需要再為後台開發除錯而充滿挫折
喜歡專注於VUE開發的你，將能夠升級為全棧工程師，自己搞定後台

這支影片花了我大量的時間，從年前就規劃並製作到現在，足以作為付費課程內容，一段時間之後可能就會下架，如果有需要的話，可要趕緊在下架前學起來唷!

我知道你擔心自己跟不上，這支影片是一步步的帶著你作出網頁，再加上觀念說明，所以長度超過60分鐘，就算不熟PHP的你都做得到!

想知道影片何時會上線? 告訴你個好消息，影片已經上架囉 ，趕緊搶個好位置來學習自動生成後台技術吧!

[Youtube傳送門](https://youtu.be/wXg0ZdH9Kl0)
## 教學文稿

### 專案準備

首先我們先來準備專案資料夾

課程是假設大家都已經擁有Laravel的開發環境
如果還沒有開發環境的小夥伴也沒關係
你可以參考我放在資訊欄的環境建置筆記

第一步 先建立一個新的專案
開啟Terminal 輸入以下指令

`laravel new webs`

webs 就是專案的名稱

> 建立新專案示範

第二步 要為專案建立資料庫
名稱同樣取為 webs
資料庫編碼請選擇utf8mb4
這樣才能支援表情符號

> 建立資料庫示範

第三步 確認專案的設定是否正確

第一個確認 config/app.php

第二個確認 .env 隱私設定檔

> 確認設定檔示範

第四步 下載 Voyager 套件

開啟Terminal 輸入以下指令

`composer require tcg/voyager`

> 下載套件示範

第五步 安裝 Voyager 套件

輸入以下指令

`php artisan voyager:install`

這一步其實可以加上--with-dummy選項就能安裝假資料 
但我今天的實作不會用到假資料
有需要的小夥伴你可以自己試試看

> 安裝Voyager套件示範

第六步 Voyager安裝完畢
代表後台已經生成了 但是我們還沒有帳號能夠登入
所以這一步 需要生成管理員帳號
輸入以下指令

`php artisan voyager:admin admin@admin.com --create`

這裡加上create選項是表示這個使用者還不存在需要新增

接著Terminal就會以互動的方式要求你輸入使用者相關的欄位資料

> 建立管理員帳號示範

最後完成管理者帳號的建立

第六步 最後我們確認看看後台能否正常登入與使用

開啟瀏覽器輸入專案網址並在後面加上/admin

http://webs.test/admin

在登入頁面輸入剛才設定的帳號與密碼
如果一切順利你應該就能看到Voyager的後台
後台的文字也應該都是繁體中文才對
如果你看到的是英文版本 就代表第三步確認設定出了問題 
請回去再看一次然後把資料庫清空再做一次

到這裡我們已經完成了專案的前置準備

接下來進入一頁式網頁的實作展示

對了 如果你是第一次來到我們頻道的話
哥布林挨踢頻道是專注於電腦科學相關的課程
每週四下午6點都有新的影片上線
如果聽完今天的單元覺得對你有幫助的話
請幫忙給影片按讚訂閱我們的頻道
也別忘了開啟小鈴鐺唷

---
### 前台套版導入

回到實作展示
這次實作的前端是使用免費的前端版型Moderna
好方便大家可以拿來練習
它的網址會列在下方資訊欄

實際上你可以替換成任何自己喜歡的版型
作法都一樣也不會有任何問題的 請放心
另外這次的實作展示的所有內容
都會放在筆記本當中
所有的程式碼也都可以到筆記本裡頭去複製
筆記本連結請參考底下資訊欄

這一小節 我們來示範前端套版的導入

> 前台套版導入示範
　
進到Moderna官網
點Free Download來把版型下載到電腦裡頭
我們選擇 Bootstrap v4的版本
下載並解壓縮後會看到一堆的html範例檔以及assets資料夾
請把assets資料夾放進public資料夾
而index.html就是我們這次要使用的模版

把index.html檔案複製到resources/view資料夾內
更名為 demo.blade.php

新增一個控制器 名為SiteController
開啟Terminal，輸入以下指令

`php artisan make:controller SiteController`

開啟 SiteController.php
我們將要加入一個 renderDemoPage() 用來渲染展示頁
請輸入以下程式碼:

```
//app\Http\Controllers\SiteController.php

public function renderDemoPage(){
    return view('demo');
}
```

接著要在路由檔去加入路由來將請求分配給新的控制器方法
開啟 web.php
請輸入以下程式碼:

```
//routes\web.php

Route::get('/demo','App\Http\Controllers\SiteController@renderDemoPage');
```

完成之後，開啟瀏覽器輸入專案網址以及demo路徑
看看網頁是否正常出現

到這裡我們已經完成前端框架的導入 是否很簡單呢

---
### 示範 Voyager 的BREAD

這一小節 我們要示範如何導入Voyager來實作CRUD

現在前端的資料都來自於Blade檔 還沒有與資料庫連結
所以接下來我將要示範如何改由Voyager來管理資料庫的資料
以及將資料從後端拋到前台畫面上

> Voyager的BREAD示範

#### 示範腳本

拜現在網頁都要支持RWD所賜 現在的網頁看起來都很像是積木一樣
也就是說一頁式網頁就是由多的網頁元素拼圖組合而成
就像是畫面現在所劃的樣子 這就是多個網頁元素
每個網頁元素包含title標題 subtitle次標題
image 圖片 以及 content 內容等欄位
取名為Element，而對應的表格就是elements

為了簡化示範，我已經把Migration檔案內容準備好了
就像是這個樣子 大家可以直接到筆記本去複製下來改用


```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateElements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elements', function (Blueprint $table) {
            $table->id();
            $table->string('page', 20); //頁面
            $table->string('title', 40); //標題
            $table->string('position', 20); //位置
            $table->string('icon', 40)->nullable(); //圖示
            $table->string('subtitle', 80)->nullable(); //副標題
            $table->string('content', 2000)->nullable(); //內容
            $table->string('url', 255)->nullable(); //網址
            $table->string('url_txt', 100)->nullable(); //網址文字
            $table->string('pic', 255)->nullable(); //圖片
            $table->string('video', 255)->nullable(); //影片網址
            $table->string('alt', 100)->nullable(); //替代文字
            $table->integer('sort')->default(0); //排序
            $table->boolean('enabled')->default(true); //是否啟用
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('elements');
    }
}
```

我們就用它來建立Migration檔案
開啟Terminal 輸入以下指令

`php artisan make:migration create_elements_table`
`php artisan migrate`

完成後確認一下表格是否正常生成

接著就要開始Voyager的功能設定作業了

在進到BREAD的設定實作之前先簡單的說一下
在Voyager裡頭兩個很重要的表格
分別是 data_types 以及 data_rows
這邊說明一下DataType以及DataRow的關係
每個資料庫表格都會有一個DataType來紀錄該表格的BREAD設定
而每個DataType擁有多個DataRow來說明各欄位的BREAD設定

進到後台開啟 BREAD 功能
這時候 elements 的 BREAD 功能還沒建立
先來建立它

接著開始設定 elements的 BREAD

> BREAD 設定說明

完成設定之後，你就有個CRUD介面可以使用囉
我們就開始建立元素資料 把前台的內容填進去吧

> 填寫網頁元素資料

資料面已經準備好了 再下來我們調整控制器
請控制器到後台抓取資料後再傳進View裡頭

```
//app\Http\Controllers\SiteController.php

public function renderDemoPage(){
    $items_slider = Element::where('page', 'home')->where('position', 'slider')->where('enabled', 1)->orderBy('sort', 'asc')->get();
    $item_row3_top = Element::where('page', 'home')->where('position', 'row3')->where('mode', 'txt')->where('enabled', 1)->orderBy('sort', 'asc')->first();
    $items_row3 = Element::where('page', 'home')->where('position', 'row3')->where('mode', 'imgText')->where('enabled', 1)->orderBy('sort', 'asc')->get();

    return view('demo',compact('items_slider','item_row3_top','items_row3'));
}
```

接著修改 View 視圖 把原本寫死的文字改成抓取控制器傳來的參數

```
//resources\views\demo.blade.php


```


完成之後，開啟瀏覽器輸入專案網址以及demo路徑
看看網頁上的內容是否正確



---



另外BREAD可以說是Voyager的核心
透過剛才的展示沒辦法把所有細節講完
建議大家可以去參考我整理的Voyager中文技術手冊

---
### 示範 Voyager 的選單管理員

接下來這一小節 我們要示範如何利用Voyager來管理前端的選單

目前前端的選單結構都是寫死在Blade檔裡頭
但其實Voyager就有個選單管理員可以來幫助我們管理選單
接著我來展示該如何使用

> 主選單建立示範

#### 示範腳本

完成了選單的建立接著就可以回到前台來叫用囉
這裡就可以先將選單的程式碼先註解掉改成以下的程式碼

`{{ menu('frontend')}}`

frontend就是我們剛為選單所取的名字

完成之後，開啟瀏覽器輸入專案網址以及demo路徑
看看網頁上的主選單是否有出現內容

你會發現內容確實有出來但遺憾的是格式卻跑掉了
怎麼辦呢 你不用擔心
Voyager早就為你想到了
因為大部分套版都有自定義樣式類別 
如果沒在標籤中加入這些樣式類別就無法正常出現
因此我們必須要新增一個選單視圖並告知menu()要使用它

請在views資料夾建立一個menu子資料夾
並在裡頭建立primary.blade.php 檔案

裡頭程式碼像這樣

```
//resources/views/menu/primary.blade.php

<nav class="nav-menu float-right d-none d-lg-block">
    <ul>
        @foreach($items as $item)
            @php
                $sub2menu = $item->children;
            @endphp
            @if(isset($sub2menu) && count($sub2menu) > 0)
                <li class="drop-down"><a href="{{$item->link()}}">{{$item->title}} </a>
                <ul>
                    @foreach($sub2menu as $sub2_item)
                        <li><a href="{{$sub2_item->link()}}">{{$sub2_item->title}} </a></li>
                    @endforeach
                </ul>
            @else
                <li><a href="{{$item->link()}}">{{$item->title}} </a>
            @endif
        </li>
        @endforeach
    </ul>
</nav>
```

再回到前台視圖 把menu()加入第二參數
也就是選單視圖改用menu資料夾的primary

`{{ menu('frontend','menu.primary') }}`


完成之後，再開啟瀏覽器輸入專案網址以及demo路徑
看看這次網頁上的選單是否格式就正確了

---


這個技巧除了可以用來製作上方的主選單
下面的Footer選單同樣可以舉一反三
用Voyager選單管理員來製作唷

---

### 示範 Voyager 設定管理員

最後這一小節 我們要示範如何利用Voyager來管理前端的參數
比如電話號碼.社群連結與地址等等

> 設定管理員示範

#### 示範腳本

目前這些資料都同樣寫在視圖內 修改較為不便
我們將透過Voyager的設定管理員來幫我們管理這些設定
將前台的電話和Email這兩個設定移到後台去

進到Voyager後台的設定管理員
在frontend這個群組加上phone和email這兩組設定

> 在設定管理員加入設定

完成之後預設你會看到旁邊有程式碼提示
告訴你可以怎麼去取得設定
因此你可以把這段複製起來
貼到前端視圖替換掉原本的內容

當我們把這些內容全都替換完畢後儲存
再開啟瀏覽器輸入專案網址以及demo路徑
看看這次網頁下方的聯絡方式有沒有正常顯示

---

透過這次的一頁式網頁實作
我們展示了Voyager的BREAD
選單管理員以及設定管理員的使用
並簡單示範如何與Laravel結合

如果這個單元的示範 你覺得意猶未盡
不用擔心 我為大家準備好了EzLaravel套件
裡頭的demo頁有今天這個示範的完整程式碼供你參考
關於EzLaravel套件的使用說明
請參考資訊卡或底下資訊欄

更棒的是這個套件不只是作為範例 
你可以用它來快速建置你的網站
裡頭已經為網頁元素以及文章等表格建立了完整的BREAD設定了
連CRUD視圖都客製好 方便你提包入住

下一個單元我們仍將利用Voyager來為你示範更多應用
如果有你想知道而我沒展示的 請在底下留言
也許下個單元我就會製作你要的應用囉

如果今天的示範教學你覺得有幫助的話
希望你能夠訂閱我們頻道並開啟小鈴鐺
以免錯過我為你製作的下一支教學影片

我是哥布林工程師，我們下次再見，掰掰

## 參考網址

* [Laravel5.8 從入門到實戰](https://hahow.in/cr/goblinlab-laravel58)
* [Moderna前台套版](https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/download/)
* [課程筆記](https://hackmd.io/@goblinlab/SkDdTe4kO)
* [EzLaravel套件介紹影片](https://youtu.be/J5SjwZ2aY6c)
* [Voyager套件簡介影片](https://youtu.be/ZW4RLDDUuFQ)
