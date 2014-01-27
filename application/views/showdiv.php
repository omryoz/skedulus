<script type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>
<table cellpadding="5px" border="1" style="margin-top:12px; margin-bottom:12px; color:#fff; font-size:.7em;">
            <tr>
                <td>
                    <a  href="javascript:;" class=" launch" style="color: #40454a !important; text-shadow: 0px 1px 1px #fff; font-size: 14px; font-weight: 600;">Book appointment</a>
                </td></tr>
				<?php if(isset($this->session->userdata['role']) && $this->session->userdata['role']=='manager'){?>
				<tr>
                <td>
                    <a  href="javascript:busytime()" class=" busytime" style="color: #40454a !important; text-shadow: 0px 1px 1px #fff; font-size: 14px; font-weight: 600;">busytime</a>
                </td>
                </tr>
				<?php }?>
        </table>