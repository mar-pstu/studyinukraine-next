<table cellspacing="0" style="border: 1px solid #bbbbbb; width: 100%;">
	<tbody>
		<tr>
			<td style="border: 1px solid #bbbbbb; padding: 2px 5px;"><?php _e( 'IP пользователя', $this->textdomain ); ?></td>
			<td style="border: 1px solid #bbbbbb; padding: 2px 5px; width: 30%;"><?php echo $user_ip; ?></td>
		</tr>
		<tr>
			<td style="border: 1px solid #bbbbbb; padding: 2px 5px;"><?php _e( 'Email пользователя', $this->textdomain ); ?></td>
			<td style="border: 1px solid #bbbbbb; padding: 2px 5px; width: 30%;"><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo $email; ?></a></td>
		</tr>
	</tbody>
</table>