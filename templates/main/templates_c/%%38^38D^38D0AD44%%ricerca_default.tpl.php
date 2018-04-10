<?php /* Smarty version 2.6.26, created on 2010-06-07 16:44:50
         compiled from ricerca_default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'ricerca_default.tpl', 12, false),array('modifier', 'string_format', 'ricerca_default.tpl', 19, false),)), $this); ?>
        <div class="content-1col-box">
          <!-- Subcell LEFT -->
          <div class="content-2col-box-leftcolumn">
            <?php if ($this->_tpl_vars['dati'] != false): ?>
            <!-- Subcell content -->
            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dati']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <?php if ($this->_sections['i']['iteration'] % 2 == 1): ?>
            <div class="corner-content-2col-top"></div>
            <div class="content-2col-box">
              <h1><a href="?controller=ricerca&task=dettagli&id_libro=<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['ISBN']; ?>
"><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['titolo']; ?>
</a></h1>
              <h5><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['autore']; ?>
</h5>
              <p><img height="120" src="copertine/<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['copertina']; ?>
" alt="<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['titolo']; ?>
" title="<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['titolo']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dati'][$this->_sections['i']['index']]['descrizione'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 240, " [...]") : smarty_modifier_truncate($_tmp, 240, " [...]")); ?>
</p>
                  <?php $this->assign('somma', "`0`"); ?>
                  <?php $this->assign('max', "`0`"); ?>
              <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['dati'][$this->_sections['i']['index']]['commento']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                  <?php $this->assign('somma', ($this->_tpl_vars['dati'][$this->_sections['i']['index']]['commento'][$this->_sections['j']['index']]['votazione']+$this->_tpl_vars['somma'])); ?>
                  <?php $this->assign('max', ($this->_sections['j']['max'])); ?>
              <?php endfor; endif; ?>
              <p class="details"><b>Media Voti:</b> | <a href="#"><?php if ($this->_tpl_vars['dati'][$this->_sections['i']['index']]['media_voti'] > 0): ?><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['media_voti']; ?>
<?php else: ?>-<?php endif; ?></a> | Categoria: <a href="#"><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['categoria']; ?>
</a> | Prezzo: <a href="#"><?php echo ((is_array($_tmp=$this->_tpl_vars['dati'][$this->_sections['i']['index']]['prezzo'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</a> |</p>
              <form action="index.php" method="post">
              <input type="hidden" name="id_libro" value="<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['ISBN']; ?>
" />
              <input id="button" type="submit" name="task" value="Aggiungi al Carrello" />
              <input type="hidden" name="controller" value="ordine" />
              </form>
            </div>
            <div class="corner-content-2col-bottom"></div>
            <?php endif; ?>
            <?php endfor; endif; ?>
            <?php endif; ?>
          </div>
          <div class="content-2col-box-rightcolumn">
            <?php if ($this->_tpl_vars['dati'] != false): ?>
            <!-- Subcell content -->
            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dati']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <?php if ($this->_sections['i']['iteration'] % 2 == 0): ?>
            <div class="corner-content-2col-top"></div>
            <div class="content-2col-box">
              <h1><a href="?controller=ricerca&task=dettagli&id_libro=<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['ISBN']; ?>
"><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['titolo']; ?>
</a></h1>
              <h5><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['autore']; ?>
</h5>
              <p><img height="120" src="copertine/<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['copertina']; ?>
" alt="<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['titolo']; ?>
" title="<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['titolo']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['dati'][$this->_sections['i']['index']]['descrizione'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 240, " [...]") : smarty_modifier_truncate($_tmp, 240, " [...]")); ?>
</p>
                  <?php $this->assign('somma', "`0`"); ?>
                  <?php $this->assign('max', "`0`"); ?>
          <?php unset($this->_sections['k']);
$this->_sections['k']['name'] = 'k';
$this->_sections['k']['loop'] = is_array($_loop=$this->_tpl_vars['dati'][$this->_sections['i']['index']]['commento']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['k']['show'] = true;
$this->_sections['k']['max'] = $this->_sections['k']['loop'];
$this->_sections['k']['step'] = 1;
$this->_sections['k']['start'] = $this->_sections['k']['step'] > 0 ? 0 : $this->_sections['k']['loop']-1;
if ($this->_sections['k']['show']) {
    $this->_sections['k']['total'] = $this->_sections['k']['loop'];
    if ($this->_sections['k']['total'] == 0)
        $this->_sections['k']['show'] = false;
} else
    $this->_sections['k']['total'] = 0;
if ($this->_sections['k']['show']):

            for ($this->_sections['k']['index'] = $this->_sections['k']['start'], $this->_sections['k']['iteration'] = 1;
                 $this->_sections['k']['iteration'] <= $this->_sections['k']['total'];
                 $this->_sections['k']['index'] += $this->_sections['k']['step'], $this->_sections['k']['iteration']++):
$this->_sections['k']['rownum'] = $this->_sections['k']['iteration'];
$this->_sections['k']['index_prev'] = $this->_sections['k']['index'] - $this->_sections['k']['step'];
$this->_sections['k']['index_next'] = $this->_sections['k']['index'] + $this->_sections['k']['step'];
$this->_sections['k']['first']      = ($this->_sections['k']['iteration'] == 1);
$this->_sections['k']['last']       = ($this->_sections['k']['iteration'] == $this->_sections['k']['total']);
?>
              <?php $this->assign('somma', ($this->_tpl_vars['dati'][$this->_sections['i']['index']]['commento'][$this->_sections['k']['index']]['votazione']+$this->_tpl_vars['somma'])); ?>
              <?php $this->assign('max', ($this->_sections['k']['max'])); ?>
          <?php endfor; endif; ?>
              <p class="details"><b>Media Voti:</b> | <a href="#"><?php if ($this->_tpl_vars['dati'][$this->_sections['i']['index']]['media_voti'] > 0): ?><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['media_voti']; ?>
<?php else: ?>-<?php endif; ?></a> | Categoria: <a href="#"><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['categoria']; ?>
</a> | Prezzo: <a href="#"><?php echo ((is_array($_tmp=$this->_tpl_vars['dati'][$this->_sections['i']['index']]['prezzo'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</a> |</p>
              <form action="index.php" method="post">
              <input type="hidden" name="id_libro" value="<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['ISBN']; ?>
" />
              <input id="button" type="submit" name="task" value="Aggiungi al Carrello" />
              <input type="hidden" name="controller" value="ordine" />
              </form>
            </div>
            <div class="corner-content-2col-bottom"></div>
            <?php endif; ?>
            <?php endfor; endif; ?>
            <?php endif; ?>
          </div>
       </div>
        <?php if ($this->_tpl_vars['pagine'] != ''): ?>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
            <h2 class="pages">
           <?php unset($this->_sections['pages']);
$this->_sections['pages']['name'] = 'pages';
$this->_sections['pages']['loop'] = is_array($_loop=$this->_tpl_vars['pagine']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pages']['show'] = true;
$this->_sections['pages']['max'] = $this->_sections['pages']['loop'];
$this->_sections['pages']['step'] = 1;
$this->_sections['pages']['start'] = $this->_sections['pages']['step'] > 0 ? 0 : $this->_sections['pages']['loop']-1;
if ($this->_sections['pages']['show']) {
    $this->_sections['pages']['total'] = $this->_sections['pages']['loop'];
    if ($this->_sections['pages']['total'] == 0)
        $this->_sections['pages']['show'] = false;
} else
    $this->_sections['pages']['total'] = 0;
if ($this->_sections['pages']['show']):

            for ($this->_sections['pages']['index'] = $this->_sections['pages']['start'], $this->_sections['pages']['iteration'] = 1;
                 $this->_sections['pages']['iteration'] <= $this->_sections['pages']['total'];
                 $this->_sections['pages']['index'] += $this->_sections['pages']['step'], $this->_sections['pages']['iteration']++):
$this->_sections['pages']['rownum'] = $this->_sections['pages']['iteration'];
$this->_sections['pages']['index_prev'] = $this->_sections['pages']['index'] - $this->_sections['pages']['step'];
$this->_sections['pages']['index_next'] = $this->_sections['pages']['index'] + $this->_sections['pages']['step'];
$this->_sections['pages']['first']      = ($this->_sections['pages']['iteration'] == 1);
$this->_sections['pages']['last']       = ($this->_sections['pages']['iteration'] == $this->_sections['pages']['total']);
?>
               <a href="index.php?controller=ricerca&task=<?php echo $this->_tpl_vars['task']; ?>
<?php if ($this->_tpl_vars['parametri'] != ''): ?>&<?php echo $this->_tpl_vars['parametri']; ?>
<?php endif; ?>&page=<?php echo $this->_sections['pages']['iteration']-1; ?>
"><?php echo $this->_sections['pages']['iteration']; ?>
</a>
           <?php endfor; endif; ?>
           </h2>
        </div>
        <div class="corner-content-1col-bottom"></div>
        <?php endif; ?>