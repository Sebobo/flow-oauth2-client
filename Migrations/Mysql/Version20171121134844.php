<?php
namespace Neos\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 *
 */
class Version20171121134844 extends AbstractMigration
{

    /**
     * @return string
     */
    public function getDescription()
    {
        return 'Longer fields for tokens and secret';
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');
        $this->addSql('ALTER TABLE flownative_oauth2_client_oauthtoken CHANGE clientsecret clientsecret VARCHAR(5000) DEFAULT NULL, CHANGE accesstoken accesstoken VARCHAR(5000) NOT NULL, CHANGE refreshtoken refreshtoken VARCHAR(5000) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');
        $this->addSql('ALTER TABLE flownative_oauth2_client_oauthtoken CHANGE clientsecret clientsecret VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE accesstoken accesstoken VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE refreshtoken refreshtoken VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
