<?php

use Illuminate\Database\Seeder;

class GuidesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('guides')->delete();
        
        \DB::table('guides')->insert(array (
            0 => 
            array (
                'id' => 2,
                'image' => '/uploads/5a66ec427fed3.jpeg',
                'name' => 'guide1',
                'topics' => '["Avoiding the use of a back-endservice","Styling the IFRAME element with CSS"]',
                'content' => '["<p>content<\\/p>","<p>content<\\/p>"]',
                'created_at' => '2018-01-07 17:24:10',
                'updated_at' => '2018-01-23 13:33:14',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'image' => '/uploads/5a50839738763.png',
                'name' => 'guide 2',
                'topics' => '["topic1","topic 2"]',
            'content' => '["<p>function editTEChangeListener(){<br \\/>\\r\\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $.each($(&#39;#editModalForm textarea&#39;),function(key,value){<br \\/>\\r\\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; editorid=$(value).attr(&#39;id&#39;);<br \\/>\\r\\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $(&quot;#&quot;+editorid).text(CKEDITOR.instances[editorid].getData());<br \\/>\\r\\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; });<br \\/>\\r\\n&nbsp; &nbsp; &nbsp; &nbsp; }<\\/p>","<p>this is new<\\/p>\\r\\n\\r\\n<h1>Styling the IFRAME element with&nbsp;CSS<\\/h1>\\r\\n\\r\\n<p>At this stage, we will assign width and height to the IFRAME element, so that we display the entire page we wish to capture in our screenshot. The following CSS will do the trick:<\\/p>\\r\\n\\r\\n<pre>\\r\\n.thumbnail iframe {\\r\\n  width: 1440px;\\r\\n  height: 900px;\\r\\n}<\\/pre>"]',
                'created_at' => '2018-01-07 17:32:34',
                'updated_at' => '2018-01-07 17:33:41',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'image' => '/uploads/5a50839738763.png',
                'name' => 'guide 3',
                'topics' => '["topic 1","topic 2"]',
                'content' => '["<p>content<\\/p>","<p>content<\\/p>"]',
                'created_at' => '2018-01-13 13:26:34',
                'updated_at' => '2018-01-13 13:26:34',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'image' => '/uploads/5a66ec312f6d8.jpeg',
                'name' => 'sales',
                'topics' => '["Boost your sales through Account Management","Amazon TATKAL - Your Superfast Solution to Selling Online"]',
            'content' => '["<p>Amazon.in is India&rsquo;s largest online marketplace where crores of customers come to shop from a varied range of products, giving you the ability to sell all across the country. Hundreds of sellers, selling different kinds of products (from apparel to grocery)&nbsp;<a href=\\"https:\\/\\/services.amazon.in\\/services\\/sell-on-amazon\\/benefits.html\\/ref=as_in_blog_post10\\">register<\\/a>&nbsp;to sell on Amazon every day to expand their businesses. While it is highly profitable for you to be a part of such a huge marketplace, it also means more competition and the need for you to always provide customers with excellent products and services.<\\/p>\\r\\n\\r\\n<p>To help you do that, Amazon has a dedicated team of professionals who can help you with managing your online business account. This team, known as the Account Management team, is equipped with data and knowledge to give you the right suggestions on actions that you can take to increase the visibility, discoverability and sales of your products.<br \\/>\\r\\n<br \\/>\\r\\nThis team analyses your business type, requirements and performance and then shares important information with you via e-mails, SMS and Seller Central notifications on opportunities to grow your sales. The kind of assistance, guidance and tips shared vary for different businesses, at different times, depending on the type and kind of products you sell. So all you have to do to get this information is to keep an eye out for emails and SMS from Amazon sent to your registered email address.<\\/p>\\r\\n\\r\\n<p>Some examples of the inputs the team will share with you are as follows:<\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li><strong>Inputs to run<\\/strong><strong>&nbsp;Lightning Deals or Banner Promotions&nbsp;<\\/strong><br \\/>\\r\\n\\tAmazon has a dedicated page for deals and promotions that run for a short time durations. You can offer great deals on your products (reduced cost for a brief time period) and benefit from selling large quantities of units in one go.<br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li><strong>Inputs on upcoming events<\\/strong><strong>&nbsp;on Amazon.in&nbsp;<\\/strong><br \\/>\\r\\n\\tAmazon.in runs promotional events for festivals and occasions regularly where you can sell related, fast moving products. You will be informed about these events well in advance so you can arrange for products in demand within the given time.<br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li><strong>Inputs on selection expansion<\\/strong><br \\/>\\r\\n\\tYou will also receive regular advice and inputs on products or sub categories that are in high demand and buyers are looking to buy. Look out for alerts about the products for which the demand will increase in the coming months as it will help you plan ahead and arrange for the estimated amount of products.<br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li><strong>Suggestions to improve your listing quality<\\/strong><br \\/>\\r\\n\\tBefore making a purchase, online buyers pay great attention to the product information added by you. Details such as dimensions, performance, images and specifications help a buyer make a quick and informed decision. You will be given multiple suggestions on how to improve your product listings and can also get help from our third party&nbsp;<a href=\\"https:\\/\\/sellercentral.amazon.in\\/spn\\/?ref=spn_hp&amp;ld=NSGoogle\\" target=\\"blank\\">service provider network<\\/a>.<\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p><strong>Other inputs relevant to your business&nbsp;<\\/strong><br \\/>\\r\\nThere will also be more suggestions and inputs shared with you like business specific information on categories that can help you grow, information on specific products that you can promote or keep in stock or new services from Amazon that can help you expand your sales.<\\/p>\\r\\n\\r\\n<p>As an Amazon seller, you will automatically be receiving all of this information through e-mails on your registered email ID (the email that you use to log in to Seller Central). Please make sure that you check your registered email-ID regularly so that you do not miss out on any of these important mailers and the chance to participate in any of the events or promotions during which your products can get good sales.<\\/p>\\r\\n\\r\\n<p>As always, in case you have queries or would like assistance with your selling account, please get in touch with our&nbsp;<a href=\\"https:\\/\\/sellercentral.amazon.in\\/gp\\/contact-us\\/contact-amazon-form.html\\/ref=as_in_blog_post10?ld=NSGoogle\\">Seller Support team<\\/a>&nbsp;and you will receive complete guidance.<\\/p>","<p>A unique, one-of-a-kind initiative has just been launched by Amazon India to make it super simple and quick for sellers to register, set-up account, complete product photo-shoots and start selling all in one. It is called Amazon TATKAL and it provides complete seller account setup service - on wheels. This is what it looks like (with the team):<br \\/>\\r\\n&nbsp;<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p>Staying focused on our passion to transform the way India buys and sells, Amazon TATKAL is designed to help thousands of small and medium sized businesses adapt easily to online selling and that too within 60 minutes. It is a fully equipped truck with the following services for sellers:<\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li>Trained professionals to help new sellers register their accounts on Amazon.in<\\/li>\\r\\n\\t<li>Inbuilt photography studio for on-the-spot product images<\\/li>\\r\\n\\t<li>Expert help in catalogue creation and product listing<\\/li>\\r\\n\\t<li>Guided training in how to manage product inventory and how to use the Seller Central platform<\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p>There are two Amazon TATKAL vans currently deployed &ndash; one travelling through cities in the north of India and one travelling to serve sellers in the south. Both trucks will travel through seller dense areas across multiple cities* in the country and will engage with and help thousands of local businesses over the next several months.<\\/p>\\r\\n\\r\\n<p>Amazon has been constantly working hard on making tools and services that cater to and solve the challenges of the large variety of sellers in India. Services like Amazon TATKAL are especially being designed to simplify the entire process of selling products online. Similarly, numerous training videos to help guide new and existing sellers are available on the&nbsp;<a href=\\"https:\\/\\/www.youtube.com\\/channel\\/UCjs5ePs1EZLGhe1T3xw97gQ?ld=NSGoogle\\" target=\\"self\\">Amazon Seller University&rsquo;s YouTube channel&nbsp;<\\/a>and live training sessions are also hosted to help sellers start selling on Amazon.<\\/p>\\r\\n\\r\\n<p>At Amazon, we will continue to innovate on behalf of our buyers and sellers and you can look forward to more such interesting and problem solving initiatives. Meanwhile, if you too are interested in selling your products on Amazon, then simply&nbsp;<a href=\\"http:\\/\\/services.amazon.in\\/services\\/sell-on-amazon\\/benefits.html\\/ref=as_in_blog_post6\\" target=\\"self\\">click here to register your account and start selling.<\\/a><\\/p>\\r\\n\\r\\n<p><em>* Amazon TATKAL will cover the following cities over the next few months:&nbsp;<\\/em><em>Ambala, Amritsar, Delhi, Jalandhar, Kochi, Kozhikode and Mangalore.<\\/em><\\/p>"]',
                'created_at' => '2018-01-23 13:32:57',
                'updated_at' => '2018-01-23 17:12:23',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}