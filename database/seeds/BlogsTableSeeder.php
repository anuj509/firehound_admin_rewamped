<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blogs')->delete();
        
        \DB::table('blogs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'blog1',
                'image' => '/uploads/5a55169f9929c.jpeg',
                'content' => '<p>the sun is setting.wow!</p>',
                'posted_by' => 'Anuj Shah',
                'created_at' => '2018-01-10 00:53:11',
                'updated_at' => '2018-01-10 00:55:43',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'scifi blog',
                'image' => '/uploads/5a6211cc6948f.jpeg',
                'content' => '<p>From&nbsp;<a href="http://www.barnesandnoble.com/w/the-time-machine-h-g-wells/1116614876?ean=9781506152516"><em>The Time Machine</em></a>&nbsp;to&nbsp;<a href="http://www.barnesandnoble.com/w/dvd-star-trek-the-original-series-season-3/18223912?ean=97360743548">Kirk and Uhura</a>&lsquo;s&nbsp;<a href="http://www.neatorama.com/2013/04/10/TVs-First-Interracial-Kiss/" rel="noopener" target="_blank">unprecedented&nbsp;kiss</a>,&nbsp;speculative fiction has often concerned itself with breaking barriers and exploring issues of race, inequality, and&nbsp;injustice. The fantastical elements of genre, from alien beings to magical ones, allow writers to confront controversial issues in metaphor, granting them a subversive power that often goes unheralded. On this, the day we celebrate the birth of Martin Luther King, Jr., let us consider novels&nbsp;that incorporate themes of social justice into stories that still deliver the goods&mdash;compelling plots, characters you&rsquo;ll fall in love with, ideas that will expand your mind. Let&rsquo;s&nbsp;imagine a day when the utopian ideals of&nbsp;<em>Star Trek</em>&nbsp;are more than just the stuff of science fiction.</p>

<p><a href="http://www.barnesandnoble.com/w/seed-to-harvest-octavia-e-butler/1007880864?ean=9780446698900"><img src="http://prodimage.images-bn.com/pimages/9780446698900.jpg" /></a><a href="http://www.barnesandnoble.com/w/seed-to-harvest-octavia-e-butler/1007880864?ean=9780446698900">Seed to Harvest (Wild Seed, Mind of My Mind, Clay&#39;s Ark, and Patternmaster)</a></p>

<p><strong>Paperback</strong>&nbsp;$14.58&nbsp;|&nbsp;$19.00</p>

<p><a href="https://www.barnesandnoble.com/blog/sci-fi-fantasy/20-sci-fi-fantasy-books-message-social-justice/#">Add to Bag</a></p>

<p><a href="http://www.barnesandnoble.com/w/seed-to-harvest-octavia-e-butler/1007880864?ean=9780446698900">See All Formats &amp; Editions &rsaquo;</a></p>

<p><strong><a href="http://www.barnesandnoble.com/w/seed-to-harvest-octavia-e-butler/1007880864?ean=9780446698900">The Patternist series</a>, by Octavia Butler (<a href="http://www.barnesandnoble.com/w/wild-seed-octavia-e-butler/1103274414?ean=9780446676977"><em>Wild Seed</em></a>,&nbsp;<a href="http://www.barnesandnoble.com/w/mind-of-my-mind-octavia-e-butler/1000149889?ean=9780446361880"><em>Mind of My Mind</em></a>,&nbsp;<a href="http://www.barnesandnoble.com/w/clays-ark-octavia-e-butler/1003109541?ean=9780446603706"><em>Clay&rsquo;s Ark</em></a>,&nbsp;<a href="http://www.barnesandnoble.com/w/patternmaster-octavia-e-butler/1001867771?ean=9781453263655"><em>The Patternmaster</em></a>)</strong><br />
Most of Octavia Butler&rsquo;s books could probably find a place on this list. Arguably the most prominent, most widely-read African-American sci-fi writer, themes of race and power&nbsp;recur throughout her novels, including her breakout work, 1979&rsquo;s&nbsp;<em>Kindred</em>, which saw a young black girl travel back in time to the darkest days of American slavery, a witness to how much had changed, and how much hadn&rsquo;t. We&rsquo;d also highlight the&nbsp;four-book Patternist series, published between 1977 and 1984, which sketches out an alternate&nbsp;history stretching back to ancient Egypt, exploring efforts by an immortal alien being to create a new race of humanity through selective breeding.&nbsp;<em>Wild Seed</em>&nbsp;in particular uses abduction as a metaphor for slavery, as the telepathic, undying mutant&nbsp;coerces a West-African woman (herself an immortal gifted with seemingly supernatural abilities) and brings her to the U.S. in the 1700s.</p>

<p><a href="http://www.barnesandnoble.com/w/iron-council-china-mieville/1100293557?ean=9780345458421"><img src="http://prodimage.images-bn.com/pimages/9780345458421.jpg" /></a><a href="http://www.barnesandnoble.com/w/iron-council-china-mieville/1100293557?ean=9780345458421">Iron Council (New Crobuzon Series #3)</a></p>

<p><strong>Paperback</strong>&nbsp;$17.37&nbsp;|&nbsp;$18.00</p>

<p><a href="https://www.barnesandnoble.com/blog/sci-fi-fantasy/20-sci-fi-fantasy-books-message-social-justice/#">Add to Bag</a></p>

<p><a href="http://www.barnesandnoble.com/w/iron-council-china-mieville/1100293557?ean=9780345458421">See All Formats &amp; Editions &rsaquo;</a></p>

<p><strong><a href="http://www.barnesandnoble.com/w/iron-council-china-mieville/1100293557?ean=9780345458421"><em>Iron Council</em></a>, by China Mi&eacute;ville</strong><br />
Mi&eacute;ville is a member of the International Socialist Organization and wrote his doctoral thesis on Marxism, so it&rsquo;s no surprise that his sci-fi and fantasy novels, in addition to being deeply weird and incredibly imaginative, tackle questions of &nbsp;economic and social inequality and speaking truth to power. This is most evident is his celebrated&nbsp;<a href="http://www.barnesandnoble.com/s/new-crobuzon-mieville?store=allproducts&amp;keyword=new+crobuzon+mieville">Bas Lag&nbsp;trilogy</a>, particularly&nbsp;<em>Iron Council</em>, about a group of revolutionaries who seek to overthrow the corrupt powers that control and oppress the citizens of the twisted city of New Crobuzon. Though his work has been lambasted by some for being too overtly political, its narrative drive and potent imagery make it as unforgettable as literature as&nbsp;it is provoking as argument.</p>

<p><a href="http://www.barnesandnoble.com/w/midnight-robber-nalo-hopkinson/1100307502?ean=9780446675604"><img src="http://prodimage.images-bn.com/pimages/9780446675604.jpg" /></a><a href="http://www.barnesandnoble.com/w/midnight-robber-nalo-hopkinson/1100307502?ean=9780446675604">Midnight Robber</a></p>

<p><strong>Paperback</strong>&nbsp;$12.91&nbsp;|&nbsp;$14.99</p>

<p><a href="https://www.barnesandnoble.com/blog/sci-fi-fantasy/20-sci-fi-fantasy-books-message-social-justice/#">Add to Bag</a></p>

<p><a href="http://www.barnesandnoble.com/w/midnight-robber-nalo-hopkinson/1100307502?ean=9780446675604">See All Formats &amp; Editions &rsaquo;</a></p>

<p><strong><a href="http://www.barnesandnoble.com/w/midnight-robber-nalo-hopkinson/1100307502?ean=9780446675604"><em>Midnight Robber</em></a>, by Nalo Hopkinson</strong><br />
This coming-of-age novel by&nbsp;Jamaican-Canadian&nbsp;writer Hopkinson was nominated for the Hugo, Nebula, and Philip K. Dick awards. Written entirely in Caribbean patois, it tells the story of a Tan-Tan, a young girl living on a colony planet where there is a great economic divide, the lower class is under constant&nbsp;surveillance, and crimes are&nbsp;met with banishment to an alien world called New Half Way Tree. After her father commits an unforgivable offense, he flees with Tan-Tan&nbsp;to&nbsp;New Half Way Tree, where she must eventually learn to forge her own identity among the&nbsp;indigenous&nbsp;alien population while struggling to come to terms with sexual abuse. The core of the novel considers the ways marginalized individuals must act out to escape from cultural oppression.</p>

<p><a href="http://www.barnesandnoble.com/w/ancillary-justice-ann-leckie/1114308484?ean=9780316246620"><img src="http://prodimage.images-bn.com/pimages/9780316246620.jpg" /></a><a href="http://www.barnesandnoble.com/w/ancillary-justice-ann-leckie/1114308484?ean=9780316246620">Ancillary Justice</a></p>

<p><strong>Paperback</strong>&nbsp;$11.46&nbsp;|&nbsp;$16.00</p>

<p><a href="https://www.barnesandnoble.com/blog/sci-fi-fantasy/20-sci-fi-fantasy-books-message-social-justice/#">Add to Bag</a></p>

<p><a href="http://www.barnesandnoble.com/w/ancillary-justice-ann-leckie/1114308484?ean=9780316246620">See All Formats &amp; Editions &rsaquo;</a></p>

<p><strong>The Imperial Radch Trilogy,&nbsp;by Ann Leckie</strong>&nbsp;(<strong><a href="http://www.barnesandnoble.com/w/ancillary-justice-ann-leckie/1114308484?ean=9780316246620"><em>Ancillary Justice</em></a>,&nbsp;<em>Ancillary Sword, Ancillary Mercy</em>)</strong><br />
A common way science fiction addresses&nbsp;contemporary social issues is, of course, to shift the lens to focus on a speculative subject that has both nothing and everything to do with today. Ann Leckie&rsquo;s celebrated space opera/military SF trilogy, beginning with the Hugo Award-winning&nbsp;<em>Ancillary Justice</em>, picks a few good ones. Most obviously,&nbsp;the rights of artificially intelligent spaceships to self-determination, but also, the efforts, both deliberate and accidental, of dominant societies to erase the cultural values of those people it has dominated, whether economically or with military might, and the rights of those people to choose to exist with autonomy within those colonizing societies, or to be forced to conform and serve it (quite literally, in this case, in the form of zombified, mind-wiped soldier bodies). Yes, yes, there are lots of awesome chase sequences and space battles as well (and tea&hellip;so much tea), but, well, sometimes a sentient starship is more than just a sentient starship.</p>

<p><a href="http://www.barnesandnoble.com/w/an-unkindness-of-ghosts-rivers-solomon/1125856225?ean=9781617755880"><img src="http://prodimage.images-bn.com/pimages/9781617755880.jpg" /></a><a href="http://www.barnesandnoble.com/w/an-unkindness-of-ghosts-rivers-solomon/1125856225?ean=9781617755880">An Unkindness of Ghosts</a></p>

<p><strong>Paperback</strong>&nbsp;$12.50&nbsp;|&nbsp;$15.95</p>

<p><a href="https://www.barnesandnoble.com/blog/sci-fi-fantasy/20-sci-fi-fantasy-books-message-social-justice/#">Add to Bag</a></p>

<p><a href="http://www.barnesandnoble.com/w/an-unkindness-of-ghosts-rivers-solomon/1125856225?ean=9781617755880">See All Formats &amp; Editions &rsaquo;</a></p>

<p><strong><a href="https://www.barnesandnoble.com/w/an-unkindness-of-ghosts-rivers-solomon/1125856225?ean=9781617755880#/"><em>An Unkindness of Ghosts</em></a>, by Rivers Solomon</strong><br />
The remarkable debut novel by Rivers Solomon, extrapolates our history of prejudice and division into a future context, as the last remnants of humanity flee a ruined Earth onboard the generation ship<em>&nbsp;Matilda.</em>Three hundred years out, society on the ship has come to resemble a pre-Civil Rights era America (and, more than a little, the America of 2017) as a white supremecist ruling class controls the ship on the back of slave labor by its darker-skinned passengers.&nbsp;Aster is a motherless child aboard the ship&nbsp;<em>Matilda</em>, on which lowdeckers like her work on vast rotating plantations under the weak light of Baby, their engineered nuclear sun, living lives of trauma and subject to the cruel vagaries of upper deck guards. We meet Aster as she fights to save a child&rsquo;s life. omeone&mdash;probably the Sovereign, their god-benighted ruler&mdash;has cut the heat to the lower decks, and the child has something like trench foot, the limb frozen and rotting. Aster is apprentice to the Surgeon General Theo Smith, despite her low status, and is learned in the skills of medicine. When she is called by the Surgeon Theo for help to save the poisoned Sovereign, Aster is righteously defiant.She hates the Sovereign, as all the lowdeckers do&mdash;he is the exultant face of their oppression. As one ruler falls and the next is enshrined, the equilibrium of Aster and Theo&rsquo;s lives, and the lives of all&nbsp;<em>Matilda&rsquo;</em>s lower decks, are are violently upset, as the spectre of civil war appears on the artificial horizon.</p>

<p><a href="http://www.barnesandnoble.com/w/who-fears-death-nnedi-okorafor/1100316695?ean=9780756407285"><img src="http://prodimage.images-bn.com/pimages/9780756407285.jpg" /></a><a href="http://www.barnesandnoble.com/w/who-fears-death-nnedi-okorafor/1100316695?ean=9780756407285">Who Fears Death</a></p>

<p><strong>Paperback</strong>&nbsp;$7.99</p>

<p><a href="https://www.barnesandnoble.com/blog/sci-fi-fantasy/20-sci-fi-fantasy-books-message-social-justice/#">Add to Bag</a></p>

<p><a href="http://www.barnesandnoble.com/w/who-fears-death-nnedi-okorafor/1100316695?ean=9780756407285">See All Formats &amp; Editions &rsaquo;</a></p>

<p><strong><a href="http://www.barnesandnoble.com/w/who-fears-death-nnedi-okorafor/1100316695?ean=9780756407285"><em>Who Fears Death</em></a>, by Nnedi Okorafor</strong><br />
This World Fantasy Award-winner is set in a post-apocalytpic future Sudan where a light-skinned race&nbsp;oppresses&nbsp;a&nbsp;darker-skinned one, and a girl of both societies, born out of violence and gifted with magical abilities, sets off to murder her father. Incorporating scenes of barbaric female genital mutilation and the use of rape as a weapon of control, it is a harrowing, angry novel about a woman who refuses to be a victim. Okorafor&rsquo;s morerecent, Hugo-winner novella&nbsp;<a href="http://www.barnesandnoble.com/w/binti-nnedi-okorafor/1121998297?ean=9780765385253"><em>Binti</em></a>would also fit nicely here; the protagonist is a woman from a marginalized human tribe who is the first of her people to be offered a chance to study at a the galaxy&rsquo;s most elite university, but doing so will require her to give up her identity&mdash;but it is ultimately that uniqueness that will help her to save her own life and form new bonds of understanding across a vast cultural divide.</p>

<p><a href="http://www.barnesandnoble.com/w/dispossessed-ursula-k-le-guin/1100615948?ean=9780061054884"><img src="http://prodimage.images-bn.com/pimages/9780061054884.jpg" /></a><a href="http://www.barnesandnoble.com/w/dispossessed-ursula-k-le-guin/1100615948?ean=9780061054884">The Dispossessed (Hainish Series)</a></p>

<p><strong>Paperback</strong>&nbsp;$7.99</p>

<p><a href="https://www.barnesandnoble.com/blog/sci-fi-fantasy/20-sci-fi-fantasy-books-message-social-justice/#">Add to Bag</a></p>

<p><a href="http://www.barnesandnoble.com/w/dispossessed-ursula-k-le-guin/1100615948?ean=9780061054884">See All Formats &amp; Editions &rsaquo;</a></p>

<p><strong><em><a href="http://www.barnesandnoble.com/w/dispossessed-ursula-k-le-guin/1100615948?ean=9780061054884">The Dispossessed</a></em>, by Ursula K. LeGuin</strong><br />
The fight for social justice is one that is as much about economic inequality as it is about racial inequality. LeGuin&rsquo;s landmark dual Hugo and Nebula winner slots into the former category, considering the relationship between two disparate, symbiotic planets, one that embodies logical ends of extreme capitalism, and one that operates by spare, socialist ideals. The novel&rsquo;s subtitle is &ldquo;An Ambiguous Utopia,&rdquo; and it is tough to figure out where that perfect society exists within it, or if it is possible for one to truly exist anywhere (even in fiction).</p>',
                'posted_by' => 'Anuj Shah',
                'created_at' => '2018-01-19 21:12:04',
                'updated_at' => '2018-01-19 21:12:04',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}