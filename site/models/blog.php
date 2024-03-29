<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

/**
 * Blog Model
 *
 * @since  0.0.1
 */
class BlogModelBlog extends JModelItem
{
	/**
	 * @var array messages
	 * @var array contents
	 */
	protected $postTitles;
	protected $postContents;

	/**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object
	 *
	 * @since   1.6
	 */
	public function getTable($type = 'Blog', $prefix = 'BlogTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Get the title
	 *
	 * @param   integer  $id  Greeting Id
	 *
	 * @return  string        Fetched String from Table for relevant Id
	 */
	public function getTitle($id = 1)
	{
		if (!is_array($this->postTitles))
		{
			$this->postTitles = array();
		}

		if (!isset($this->postTitles[$id]))
		{
			// Request the selected id
			$jinput = JFactory::getApplication()->input;
			$id     = $jinput->get('id', 1, 'INT');

			// Get a TableHelloWorld instance
			$table = $this->getTable();

			// Load the message
			$table->load($id);

			// Assign the message
			$this->postTitles[$id] = $table->title;
		}

		return $this->postTitles[$id];
	}

	/**
	 * Get the content
	 *
	 * @param   integer  $id  Greeting Id
	 *
	 * @return  string        Fetched String from Table for relevant Id
	 */
	public function getContent($id = 1)
	{
		if (!is_array($this->postContents))
		{
			$this->postContents = array();
		}

		if (!isset($this->postContents[$id]))
		{
			// Request the selected id
			$jinput = JFactory::getApplication()->input;
			$id     = $jinput->get('id', 1, 'INT');

			// Get a TableHelloWorld instance
			$table = $this->getTable();

			// Load the message
			$table->load($id);

			// Assign the message
			$this->postContents[$id] = $table->articletext;
		}

		return $this->postContents[$id];
	}
}
