<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		        $this->call('ForumGroupSeeder');
                $this->call('ForumCategorySeeder');
	}

}

		class ForumGroupSeeder extends Seeder {
		    public function run() {
		    	 DB::table('forum_groups')->delete();
		        	ForumGroup::create(array('title' => 'General Discussion','author_id' => 1));
		    }
		}

		class ForumCategorySeeder extends Seeder {
		    public function run() { 

		    	DB::table('forum_categories')->delete();
				ForumCategory::create(array('group_id' => 1,'title' => 'CS GO','author_id' => 1));		
				ForumCategory::create(array('group_id' => 1,'title' => 'WOW PVP, PVE ','author_id' => 1));
				ForumCategory::create(array('group_id' => 1,'title' => 'League of legends','author_id' => 1));		
				ForumCategory::create(array('group_id' => 1,'title' => 'Computer stuff','author_id' => 1));
				ForumCategory::create(array('group_id' => 1,'title' => 'Funny stuff','author_id' => 1));
		    }
		}

