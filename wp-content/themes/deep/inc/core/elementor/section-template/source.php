<?php
/**
 * Elementor Template Library Remote Source.
 *
 */

use Elementor\TemplateLibrary\Source_Base;
use Elementor\Plugin;

if ( ! class_exists( 'Source_deep' ) ) {
	class Source_deep extends Source_Base {
		
		/**
		 * Get ID
		 *
		 * @since	1.0.0
		*/
		public function get_id() {
			return 'deep';
		}
	
		/**
		 * Get ID
		 *
		 * @since	1.0.0
		*/
		public function get_title() {
			return esc_attr__( 'deep', 'deep-plus' );
		}
		
		/**
		 * Register Data
		 *
		 * @since	1.0.0
		*/
		public function register_data() {}
		
		/**
		 * Get Items
		 *
		 * @since	1.0.0
		*/
		public function get_items( $args = [] ) {
			return [];
		}
	
		/**
		 * Get Item
		 *
		 * @since	1.0.0
		*/
		public function get_item( $template_data ) {
			$favorite_templates = $this->get_user_meta( 'favorites' );
	
			return [
				'template_id' 		=> 'deep_' . $template_data['id'],
				'source' 			=> 'remote',
				'type' 				=> $template_data['type'],
				'subtype' 			=> $template_data['subtype'],
				'title' 			=> 'deep - ' . $template_data['title'],
				'thumbnail' 		=> $template_data['thumbnail'],
				'date' 				=> $template_data['tmpl_created'],
				'author' 			=> $template_data['author'],
				'tags' 				=> $template_data['tags'],
				'isPro' 			=> 0,
				'popularityIndex' 	=> (int) $template_data['popularity_index'],
				'trendIndex' 		=> (int) $template_data['trend_index'],
				'hasPageSettings' 	=> ( '1' === $template_data['has_page_settings'] ),
				'url' 				=> $template_data['url'],
				'favorite' 			=> ! empty( $favorite_templates[ $template_data['id'] ] ),
			];
		}
		
		/**
		 * Save Item
		 *
		 * @since	1.0.0
		*/
		public function save_item( $template_data ) {
			return false;
		}
		
		/**
		 * Update Item
		 *
		 * @since	1.0.0
		*/
		public function update_item( $new_data ) {
			return false;
		}
		
		/**
		 * Delete Template
		 *
		 * @since	1.0.0
		*/
		public function delete_template( $template_id ) {
			return false;
		}
		
		/**
		 * Export Template
		 *
		 * @since	1.0.0
		*/
		public function export_template( $template_id ) {
			return false;
		}
		
		/**
		 * Get Data
		 *
		 * @since	1.0.0
		*/
		public function get_data( array $args, $context = 'display' ) {
			$data = deep_Plus_Elemantor_Template_Manager::get_template( $args[ 'template_id' ] );
			if ( is_wp_error( $data ) ) {
				return $data;
			}

			$data[ 'content' ] = $this->replace_elements_ids( $data[ 'content' ] );
			$data[ 'content' ] = $this->process_export_import_content( $data[ 'content' ], 'on_import' );
	
			$post_id  = $_POST['editor_post_id']; // phpcs:ignore
			$document = Plugin::$instance->documents->get( $post_id );
			
			if ( $document ) {
				$data['content'] = $document->get_elements_raw_data( $data[ 'content' ], true );
			}

			return $data;
		}
		
	} // class
}
