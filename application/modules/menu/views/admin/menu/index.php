<div class="data-grid">
    <?php if (!empty($menus)): ?>
        <?php echo form_open($module . '/delete_all'); ?>

        <table border="0" class="table table-striped">
            <thead>
                <tr>
                    <th with="30" class="align-center"><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all')); ?></th>
                    <th>Title</th>
                    <th>Machine Name</th>
                    <th>Discription</th>
                    <th width="200" class="align-center">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="8">
                        <div class="inner"><?php //$this->load->view('admin/partials/pagination', $pagination);       ?></div>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($menus as $member): ?>
                    <tr>
                        <td class="align-center"><?php echo form_checkbox('action_to[]', $member->id); ?></td>
                        <td>
                            <?php echo anchor($module . '/edit/' . $member->id, $member->title); ?>
                        </td>
                        <td><?php echo $member->machine_name; ?></td>
                        <td><?php echo $member->discription; ?></td>
                        <td class="align-center buttons buttons-small" width="24%">
                            <?php echo anchor('menu/admin/menulink/add/' . $member->id, '<i class="icon-plus"></i> Add Links', array('class' => 'btn primary')); ?>
                            <?php echo anchor('menu/admin/menulink/order/' . $member->id, '<i class="icon-align-justify"></i> Order', array('class' => 'btn primary')); ?>
                            <?php echo anchor($module . '/edit/' . $member->id, '<i class="icon-pencil"></i> Edit', array('class' => 'btn')); ?>
                            <?php echo anchor($module . '/delete/' . $member->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'confirm btn btn-danger')); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="well list-bottom">
            <div class="span1">
                <button class="btn btn-large" name="save" type="submit" value="save">Delete</button>
            </div>   
            <div class="span11">
                <div class="pagination">
                    <?php echo $pagination; ?>
                </div>
            </div>
        </div>

        <?php echo form_close(); ?>

    <?php else: ?>
        <div class="well">

            <h3>No Menu has been created yet.</h3>

        </div>
    <?php endif; ?>
</div>

