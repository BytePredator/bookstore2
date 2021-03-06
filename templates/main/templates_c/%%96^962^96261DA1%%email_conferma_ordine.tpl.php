<?php /* Smarty version 2.6.26, created on 2010-06-01 10:25:10
         compiled from email_conferma_ordine.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'email_conferma_ordine.tpl', 29, false),)), $this); ?>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1>Riepilogo Ordine</h1>
          <h5><?php echo $this->_tpl_vars['dati']['autore']; ?>
</h5>
          <table>
          <tr>
            <td>Nome:</td><td><?php echo $this->_tpl_vars['dati_utente']['nome']; ?>
</td>
          </tr><tr>
            <td>Cognome:</td><td><?php echo $this->_tpl_vars['dati_utente']['cognome']; ?>
</td>
          </tr><tr>
            <td>Via:</td><td><?php echo $this->_tpl_vars['dati_utente']['via']; ?>
</td>
          </tr><tr>
            <td>CAP:</td><td><?php echo $this->_tpl_vars['dati_utente']['cap']; ?>
</td>
          </tr><tr>
            <td>Citt&agrave;:</td><td><?php echo $this->_tpl_vars['dati_utente']['citta']; ?>
</td>
          </tr><tr>
            <td>Telefono:</td><td><?php echo $this->_tpl_vars['dati_utente']['telefono']; ?>
</td>
          </tr></table>
          <table id="carrello">
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Autore</th>
                <th class="top" scope="col">Quantit&agrave;</th>
                <th class="top" scope="col">Prezzo</th>
                <th class="top" scope="col">Subtotale</th></tr>
            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['ordine']['libri']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <tr><th scope="row" align="left"><?php echo $this->_tpl_vars['ordine']['libri'][$this->_sections['i']['index']]['titolo']; ?>
</th>
                <td align="left"><?php echo $this->_tpl_vars['ordine']['libri'][$this->_sections['i']['index']]['autore']; ?>
</td>
                <td align="right"><?php echo $this->_tpl_vars['ordine']['libri'][$this->_sections['i']['index']]['quantita']; ?>
</td>
                <td align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['ordine']['libri'][$this->_sections['i']['index']]['prezzo'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</td>
                <td align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['ordine']['libri'][$this->_sections['i']['index']]['quantita']*$this->_tpl_vars['ordine']['libri'][$this->_sections['i']['index']]['prezzo'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</td></tr>
                <?php $this->assign('sub', ($this->_tpl_vars['ordine']['libri'][$this->_sections['i']['index']]['quantita']*$this->_tpl_vars['ordine']['libri'][$this->_sections['i']['index']]['prezzo'])); ?>
                <?php $this->assign('totale', ($this->_tpl_vars['totale']+$this->_tpl_vars['sub'])); ?>
            <?php endfor; endif; ?>
            <tr><th scope="row" id="numero" colspan="3"></th><th scope="col">Totale:</th><td id="numero"><?php echo ((is_array($_tmp=$this->_tpl_vars['totale'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</td></tr>
          </table>
        </div>
        <div class="corner-content-1col-bottom"></div>