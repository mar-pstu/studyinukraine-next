<table>
	<tbody>
		<tr>
			<td><?php _e( 'IP пользователя', $this->textdomain ); ?></td>
			<td><?php echo $user_ip; ?></td>
		</tr>
		<tr>
			<td><?php _e( 'Email пользователя', $this->textdomain ); ?></td>
			<td><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo $email; ?></a></td>
		</tr>
	</tbody>
</table>