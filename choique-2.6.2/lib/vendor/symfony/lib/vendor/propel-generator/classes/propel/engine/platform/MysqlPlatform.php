<?php
/*
 *  $Id: MysqlPlatform.php 3752 2007-04-11 09:11:18Z fabien $
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information please see
 * <http://propel.phpdb.org>.
 */

require_once 'propel/engine/platform/DefaultPlatform.php';

/**
 * MySql Platform implementation.
 *
 * @author     Hans Lellelid <hans@xmpl.org> (Propel)
 * @author     Martin Poeschl <mpoeschl@marmot.at> (Torque)
 * @version    $Revision: 536 $
 * @package    propel.engine.platform
 */
class MysqlPlatform extends DefaultPlatform {

	/**
	 * Initializes db specific domain mapping.
	 */
	protected function initialize()
	{
		parent::initialize();
		$this->setSchemaDomainMapping(new Domain(PropelTypes::NUMERIC, "DECIMAL"));
		$this->setSchemaDomainMapping(new Domain(PropelTypes::LONGVARCHAR, "TEXT"));
		$this->setSchemaDomainMapping(new Domain(PropelTypes::TIMESTAMP, "DATETIME"));
		$this->setSchemaDomainMapping(new Domain(PropelTypes::BU_TIMESTAMP, "DATETIME"));
		$this->setSchemaDomainMapping(new Domain(PropelTypes::BINARY, "BLOB"));
		$this->setSchemaDomainMapping(new Domain(PropelTypes::VARBINARY, "MEDIUMBLOB"));
		$this->setSchemaDomainMapping(new Domain(PropelTypes::LONGVARBINARY, "LONGBLOB"));
		$this->setSchemaDomainMapping(new Domain(PropelTypes::BLOB, "LONGBLOB"));
		$this->setSchemaDomainMapping(new Domain(PropelTypes::CLOB, "LONGTEXT"));
	}

	/**
	 * @see        Platform#getAutoIncrement()
	 */
	public function getAutoIncrement()
	{
		return "AUTO_INCREMENT";
	}

	/**
	 * @see        Platform#getMaxColumnNameLength()
	 */
	public function getMaxColumnNameLength()
	{
		return 64;
	}

	/**
	 * @see        Platform::supportsNativeDeleteTrigger()
	 */
	public function supportsNativeDeleteTrigger()
	{
		$usingInnoDB = false;
		if(class_exists('DataModelBuilder', false))
		{
			$usingInnoDB = strtolower(DataModelBuilder::getBuildProperty('mysqlTableType')) == 'innodb';
		}
		return $usingInnoDB || false;
	}

	/**
	 * @see        Platform#hasSize(String)
	 */
	public function hasSize($sqlType) {
		return !("MEDIUMTEXT" == $sqlType || "LONGTEXT" == $sqlType
				|| "BLOB" == $sqlType || "MEDIUMBLOB" == $sqlType
				|| "LONGBLOB" == $sqlType);
	}

	/**
	 * Escape the string for RDBMS.
	 * @param      string $text
	 * @return     string
	 */
	public function escapeText($text) {
		return  mysql_real_escape_string($text);
	}

	/**
	 * @see        Platform::quoteIdentifier()
	 */
	public function quoteIdentifier($text)
	{
		return '`' . $text . '`';
	}
}
