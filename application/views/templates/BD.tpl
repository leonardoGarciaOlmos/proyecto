<div id="dropzone">
	<form action="#" class="dropzone dz-clickable">
		
		<div class="dz-default dz-message">
			<span>
				{if $process eq "backup"}
					<span class="bigger-150 bolder"><i class="icon-caret-right red"></i> Backup</span> base de dato
					<span class="smaller-80 grey">(click)</span> <br> <i id="upload_button" class="upload-icon icon-cloud-download blue icon-3x" value="basedato/backup"></i>
				{elseif $process eq "restore"}
					<input  type="file" id="id-input-file-3">
				{/if}


			</span>
		</div>
	</form>
</div>


<form id="form_bd" type="POST" action="">
	<input type="hidden" name="nothing" value="" />
</form>