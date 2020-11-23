#
# Table structure for table 'tx_flightsearch_domain_model_flight'
#
CREATE TABLE tx_flightsearch_domain_model_flight (

	title varchar(255) DEFAULT '' NOT NULL,
	datetimestart int(11) DEFAULT '0' NOT NULL,
	city_start int(11) unsigned DEFAULT '0' NOT NULL,
	city_end int(11) unsigned DEFAULT '0' NOT NULL

);

#
# Table structure for table 'tx_flightsearch_domain_model_city'
#
CREATE TABLE tx_flightsearch_domain_model_city (

	flight int(11) unsigned DEFAULT '0' NOT NULL,
	flight1 int(11) unsigned DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL

);
