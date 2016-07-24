<?php
use Migrations\AbstractMigration;

class RenameImagesContactId extends AbstractMigration
{
    /**
     * Change Method.
     */
    public function change()
    {
        $table = $this->table('images');
        $column = $table->hasColumn('contact_id');

        if ($column) {
            $table->renameColumn('contact_id', 'belongs_to');
        }

    }
	/**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('images');
        $table->renameColumn('belongs_to', 'contact_id');
    }
}

