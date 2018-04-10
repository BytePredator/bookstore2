<?php /* Smarty version 2.6.26, created on 2011-05-03 10:55:15
         compiled from home_default.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">


<!--  Version: Multiflex-5.4 / Overview                     -->
<!--  Type:    Design with sidebar                          -->
<!--  Date:    March 13, 2008                               -->
<!--  Design:  www.1234.info                                -->
<!--  License: Fully open source without restrictions.      -->
<!--           Please keep footer credits with the words    -->
<!--           "Design by 1234.info". Thank you!            -->

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="3600" />
  <meta name="revisit-after" content="2 days" />
  <meta name="robots" content="index,follow" />
  <meta name="author" content="Designed by www.1234.info / Modified: Alessandro Verzicco" />
  <meta name="distribution" content="global" />
  <meta name="description" content="Your container description here" />
  <meta name="keywords" content="Your keywords, keywords, keywords, here" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/mf54_reset.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/mf54_grid.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/mf54_content.css" />
  <link rel="icon" type="image/x-icon" href="templates/main/template/img/favicon.ico" />
  <title><?php echo $this->_tpl_vars['title']; ?>
</title>
</head>

<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!-- Following line MUST remain as a comment to have the proper effect -->
<?php echo '<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->'; ?>


<body>
  <!-- CONTAINER FOR ENTIRE PAGE -->
  <div class="container">

    <!-- A. HEADER -->         
    <div class="corner-page-top"></div>        
    <div class="header">
      <div class="header-top">
        
        <!-- A.1 SITENAME -->      
        <a class="sitelogo" href="index.php" title="Home"></a>
        <div class="sitename">
          <h1><a href="index.php" title="Home">BookStore</a></h1>
          <h2>Negozio di libri Online</h2>
        </div>
    
        <!-- A.2 BUTTON NAVIGATION -->
        <div class="navbutton">
          <ul>
            <li><a href="#" title="English"><img src="templates/main/template/img/icon_flag_us.gif" alt="Flag" /></a></li>
            <li><a href="#" title="Deutsch"><img src="templates/main/template/img/icon_flag_de.gif" alt="Flag" /></a></li>
            <li><a href="#" title="Svenska"><img src="templates/main/template/img/icon_flag_se.gif" alt="Flag" /></a></li>
            <li><a href="#" title="RSS"><img src="templates/main/template/img/icon_rss.gif" alt="RSS-Button" /></a></li>
          </ul>
        </div>

        <!-- A.3 GLOBAL NAVIGATION -->
        <div class="navglobal">
          <ul>
            <li><a href="#" title="">About</a></li>
            <li><a href="#" title="">Contact</a></li>								
            <li><a href="#" title="">Sitemap</a></li>								                        
            <li><a href="#" title="">Links</a></li>								            
          </ul>
        </div>        
      </div>
    
      <!-- A.4 BREADCRUMB and SEARCHFORM -->
      <div class="header-bottom">
        <!-- Search form -->                  
        <div class="searchform">
          <form action="index.php" method="get">
            <fieldset>
              <input name="stringa" class="field"  value="Inserisci una parola da cercare" />
              <input type="hidden" name="controller" value="ricerca" />
              <input type="submit" name="task" class="button" value="Cerca" />
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <div class="corner-page-bottom"></div>    
    
    <!-- B. NAVIGATION BAR -->
    <div class="corner-page-top"></div>        
    <div class="navbar">
	
      <!-- Navigation item -->
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?controller=ricerca&task=lista">Libri</a></li>
        <li><a href="index.php?controller=ordine&task=contenuto">Carrello</a></li>
        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['menu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
                <li><a href="<?php echo $this->_tpl_vars['menu'][$this->_sections['i']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['menu'][$this->_sections['i']['index']]['testo']; ?>
</a>
                <?php if ($this->_tpl_vars['menu'][$this->_sections['i']['index']]['submenu'] != false): ?>
                    <ul>
                    <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['menu'][$this->_sections['i']['index']]['submenu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
                        <li><a href="<?php echo $this->_tpl_vars['menu'][$this->_sections['i']['index']]['submenu'][$this->_sections['j']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['menu'][$this->_sections['i']['index']]['submenu'][$this->_sections['j']['index']]['testo']; ?>
</a></li>
                    <?php endfor; endif; ?>
                    </ul>
                <?php endif; ?>
                </li>
        <?php endfor; endif; ?>
      </ul>                       
    </div>    
  
    <!-- C. MAIN SECTION -->      
    <div class="main">
      <h1 class="pagetitle"><?php echo $this->_tpl_vars['content_title']; ?>
</h1>

      <!-- C.1 CONTENT -->
      <div class="content">
        <?php echo $this->_tpl_vars['main_content']; ?>

      </div>
      
      
<!-- ************************************************************************************************** -->
<!-- ************************************************************************************************** -->
<!-- **                                                                                              ** -->
<!-- **   4. SUBCONTENT                                                                              ** -->
<!-- **                                                                                              ** -->
<!-- ************************************************************************************************** -->
<!-- ************************************************************************************************** -->      
      
      
      <!-- C.2 SUBCONTENT -->
      <div class="subcontent">
        <?php echo $this->_tpl_vars['right_content']; ?>

      <?php if ($this->_tpl_vars['tasti_laterali'] != false): ?>
        <a id="anchor-sidemenu-4"></a>
        <div class="corner-subcontent-top"></div>
        <div class="subcontent-box">
          <h1 class="menu">Menu </h1>
          <div class="sidemenu1">
            <ul>
            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['tasti_laterali']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
                <li><a href="<?php echo $this->_tpl_vars['tasti_laterali'][$this->_sections['i']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['tasti_laterali'][$this->_sections['i']['index']]['testo']; ?>
</a>
                <?php if ($this->_tpl_vars['tasti_laterali'][$this->_sections['i']['index']]['submenu'] != false): ?>
                    <ul>
                    <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['tasti_laterali'][$this->_sections['i']['index']]['submenu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
                        <li><a href="<?php echo $this->_tpl_vars['tasti_laterali'][$this->_sections['i']['index']]['submenu'][$this->_sections['j']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['tasti_laterali'][$this->_sections['i']['index']]['submenu'][$this->_sections['j']['index']]['testo']; ?>
</a></li>
                    <?php endfor; endif; ?>
                    </ul>
                <?php endif; ?>
                </li>
            <?php endfor; endif; ?>
            </ul>
          </div>
        </div>
        <div class="corner-subcontent-bottom"></div>
      <?php endif; ?>
      </div>

    </div>        

<!-- ************************************************************************************************** -->
<!-- ************************************************************************************************** -->
<!-- *******************************   END OF AVAILABLE CONTENT STYLES   ****************************** -->
<!-- ************************************************************************************************** -->
<!-- ************************************************************************************************** -->              
    
    <!-- D. FOOTER -->      
    <div class="footer">
      <p>Copyright &copy; 2010 BookStore&nbsp;&nbsp;|&nbsp;&nbsp;All Rights Reserved</p>
      <p class="credits">Layout design by <a href="http://1234.info/" title="Designer Homepage">1234.info</a> | Modified by <a href="http://lamjex.com" title="Modifyer Homepage">Alessandro Verzicco</a> | <a href="http://validator.w3.org/check?uri=referer" title="Validate XHTML code">XHTML 1.0</a> | <a href="http://jigsaw.w3.org/css-validator/" title="Validate CSS code">CSS 2.0</a></p>
    </div>
    <div class="corner-page-bottom"></div>        
  </div> 
  
</body>
</html>


