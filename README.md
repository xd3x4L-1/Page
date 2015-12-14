Page finns på Github och om du klickar på <span class="textformat1">Download ZIP så laddar du ned Page och får en katalog /page-master/page/trial.

<h1>Installation</h1>

För att installera Page lägger du katalogen /page-master/page/trial på en vald plats i din dator och öppnar 
filen .htaccess</span> i katalog /trial och katalogen /page-master/page/trial/site/data gör du skrivbar.
I filen .htaccess skall värdet för RewriteBase vara lika den lokala adressen till katalogen /trial.

<span><code>
chmod 777: /page-master/page/trial/site/data
</code></span>

Om man nu klickar på länken module/install ges en bekräftelse om att olika tabeller har införts och att en administratör root:root 
och en användare doe:doe har lagts till databasen.

Om vi tar bort variabeln $Origo->config['start'] i filen /page-master/page/trial/site/config går detta inte att göra om.

<span><code>
/* $Origo->config['start'] = 'false'; */
</code></span>

Det är nu tillfälle att ändra lösenordet för adminstratören root och det gör du genoma att logga in vid det röda äpplet med namn root och lösen root.
Då visas ett formulär och om du skriver ett nytt lösenord och klickar på Change password så uppdaterar du lösenordet.
Om du vill hindra administratören att göra om tabellerna så ändrar du variabeln $Origo->config['installed'].

<span><code>
$Origo->config['installed'] = 'true'; 
</code></span>

Om värdet är 'false' kan tabellerna installeras om och om värdet är 'true' kan de inte installeras om.

<h1>konfiguration</h1>

Det finns ett tema lingon i katalog /page-master/page/trial/site/themes/lingon med två templater index.tpl.php och meny.tpl.php, och ett format style.css och en del funktioner functions.php.
För att det skall vara enkelt att ändra grundelement i temat tittar vi nu först på hur innehållet i dem går att ändra och sen på hur de ändras till format.

<h2>Titel</h2>

Titel och slogan finns i filen /page-master/page/trial/site/config.php i en array data under $Origo->config['theme'] = array();

<span><code>
$Origo->config['theme'] = array(
'data' => array (
'header' => 'Page',
'slogan' => 'En sida om äpplen', ),);
</code></span>

Genom värdet för nyckel header ändrar du sidans titel och genom värdet för nyckeln slogan ändras sidans slogan. 

<span><code>
&lt;span id='site-title'&gt;&lt;a href='&lt;?=base_url()?&gt;'&gt;&lt;?=$header?>&lt;/a&gt;&lt;/span&gt;
&lt;span id='site-slogan'&gt;&lt;?=$slogan?&gt;&lt;/span&gt;
</code></span>

Det går att ändra stil för titel och slogan i fil /page-master/page/trial/site/themes/lingon/style.css genom att ändra värden för #site-titel a och #site-slogan.

<h2>Logotyp</h2>

För att konfigurera favicon och logo finns i filen /page-master/page/trial/site/config.php en array data under 
$Origo->config['theme'] = array();

<span><code>
$Origo->config['theme'] = array(
'data' => array (
'favicon' => 'img/Chrisdesign-Tree-silhouettes-2-300px.png',
'logo' => 'img/Chrisdesign-Tree-silhouettes-2-300px.png',
'logo_width' => 72,
'logo_height' => 72,),);  
</code></span>

Genom värdet för nyckel favicon talar du om vilken bild som är sidans favicon och genom värdet för nyckel logo talar du om vilken bild som är logo. 
Värdet för nyckel logo-width ger logons bredd i px och värdet för nyckel logo-height ger logons höjd i px.

<h2>Meny</h2>

För att visa menyn använder temat lingon en egen funktion render_own() vilket gör att menyn får kod i filen /page-master/page/trial/site/themes/lingon/meny.tpl.php.

I funktionen Render() i fil /page-master/page/trial/src/CViewContainer/CViewContainer.php ges meny.tpl.php via extract tillgång till $info() som innehåller sidans länkar som konfigurerats av filen /page-master/page/trial/site/config.php

<span><code>
$Origo->config['menus'] = array(
'lingon' => array(
'home' => array('label'=>'Äpplen', 'url'=>'lingon'),
//'del2' => array('label'=>'Äpplet', 'url'=>'lingon/del2'),
//'del3' => array('label'=>'Trädet', 'url'=>'lingon/del3'),
'blog' => array('label'=>'Blog', 'url'=>'lingon/blog'),
'tool' => array('label'=>'Tools', 'url'=>'content'),
</code></span>

I array lingon () motsvarar varje rad en länk och texten på vardera länk ges av vad som står vid 'label'=> och den text som står vid 'url'=> bakom lingon/ skall svara mot en metod i filen /page-master/page/trial/site/src/CClingon/CClingon.php.

<span><code>
&lt;div id='navbar'&gt;&lt;/div&gt;	
</code></span>

Det går att ändra stil för menyn i fil /page-master/page/trial/site/themes/lingon/style.css genom att ändra värden 
för #navbar a och .konfigurera och om du vill införa mer html så går det att göra i templaten /page-master/page/trial/site/themes/lingon/meny.tpl.php.

<h2>Footer</h2>

För att ändra den första texten i footern finns i filen /page-master/page/trial/site/config.php en array data under $Origo->config['theme'] = array();

<span><code>
$Origo->config['theme'] = array(
'data' => array (
'footer' => '&lt;p&gt; Footer: &copy; Trial enligt tutorial &lt;/p&gt;',),);  
</code></span>

Genom värdet för nyckel footer ändrar du footerns inledande text.

<span><code>
function get_own() {
return &lt;&lt;&lt;EOD
EOD;}
</code></span>

Det andra innehållet i footern ges av funktion get_own() i fil /page-master/page/trial/site/themes/lingon/functions.php och om du vill ändra det så ändra den html som finns inom markeringen return &lt;&lt;&lt;EOD  EOD;.

<span><code>
&lt;div id='footer'&gt;&lt;/div&gt;
</code></span>

Det går att ändra stil för footern i fil /page-master/page/trial/site/themes/lingon/style.css genom att ändra värden för #footer, #footer p  och #footer a.

<h2>Blogg</h2>

För att bygga en blog med temat lingon finns en metod Blog () i kontrollern /page-master/page/trial/site/src/CClingon/CClingon.php och du kan göra en blogg genom att länka till denna metod. Om du inte vill ha en blogg så tar du bort metoden.

<span><code>
public function Blog() {
$content = new CMContent();
$this->views->SetTitle('My blog')
->AddInclude(__DIR__ . '/blog.tpl.php', array(
'contents' => $content->ListAll(array('type'=>'post', 'order-by'=>'title', 'order-order'=>'DESC')),));}
</code></span>

I filen /page-master/page/trial/site/config.php finns möjlighet att konfigurera en länk till bloggen.

<span ><code>
$Origo->config['menus'] = array(
'lingon' => array(
'blog' => array('label'=>'Blog', 'url'=>'lingon/blog'),),);
</code></span>

För att skapa innhåll för bloggen klickar man på länken Create new content i fältet Actions och öppnar ett formulär som är till för detta.

I fältet Title skriver du den text som skall ge rubrik för innehållet och i fältet Key något som representerar innehållet.

Innehållet skriver du i fältet Content och i det sista fältet Filter skriver du plain om innehållet är ren text och htmlpurify om det är en förenklad typ av html.

<h2>Page</h2>

I filen /page-master/page/trial/site/src/CClingon/CClingon.php finnns en metod index () för att göra sidor och då den är med vid nedladdning så behöver du bara länka till den och om du behöver flera sidor så kopierar du metoden och ger kopiorna olika metod-namn.

<span><code>
public function Index() {
$content = new CMContent(15);
$this->views->SetTitle(''.htmlEnt($content['title']))
->AddInclude(__DIR__ . '/page.tpl.php', array(
'content' => $content,));}
</code></span>

För att länka till en sida ändrar man i filen /page-master/page/trial/site/config.php enligt vad som visas här nedan.

<span><code>
$Origo->config['menus'] = array(
'lingon' => array(
'home' => array('label'=>'Home', 'url'=>'lingon/index'),
//'del2' => array('label'=>'Äpplet', 'url'=>'lingon/del2'),
//'del3' => array('label'=>'Trädet', 'url'=>'lingon/del3'),),);
</code></span>

Under Tools i sidans meny och vidare på länken Create new content öppnas ett formulär för innehåll och om du vill skapa en sida är det ett villkor att först logga in som administratör då anonyma användare och inloggade utan rätt bara får skapa innehåll för sidans blogg.

I fältet Title skriver du den text som skall ge rubrik för innehållet och i fältet key något som representerar innehållet och i fältet för Type page. 

Sidans innehåll skriver du i fältet Content och i det sista fältet Filter plain om innehållet är ren text och htmlpurify om det är en förenklad typ av html.

<span class='PRE'><code>
public function Index() {
$content = new CMContent( ? );)); }
</code></span>

Då innehållet är klart går du in via länk Tools i menyn och om du nu läser talet framför rubriken för det innehåll som du skapat så
vet du vilket tal du skall ge i metoden Index() där frågetecknet nu finns.



