<td class="sf_admin_text sf_admin_list_td_username">
  <?php echo link_to($tb_sfGuardUser->getUsername(), 'sf_guard_user_edit', $tb_sfGuardUser) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_first_name">
  <?php echo $tb_sfGuardUser->getFirstName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_last_name">
  <?php echo $tb_sfGuardUser->getLastName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_email_address">
  <?php echo $tb_sfGuardUser->getEmailAddress() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($tb_sfGuardUser->getCreatedAt()) ? format_date($tb_sfGuardUser->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_last_login">
  <?php echo false !== strtotime($tb_sfGuardUser->getLastLogin()) ? format_date($tb_sfGuardUser->getLastLogin(), "f") : '&nbsp;' ?>
</td>
