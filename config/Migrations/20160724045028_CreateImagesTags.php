<?php
use Migrations\AbstractMigration;

class CreateImagesTags extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('images_tags');
        $table->addColumn('image_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('tag_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
		$table->addIndex(
                [
                    'image_id',
                ]
            );
        $table->addIndex(
                [
                    'tag_id',
                ]
            );
        $table->create();
    }
}
