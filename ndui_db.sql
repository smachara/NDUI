-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 22 Novembre 2016 à 15:15
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ndui_db`
--

--
-- Contenu de la table `network_config`
--

INSERT INTO `network_config` (`id`, `name`, `description`, `config_value`, `yml_value`) VALUES
(14, 'Example1', 'This is an example', '{ "class": "go.GraphLinksModel",\r\n  "linkFromPortIdProperty": "fromPort",\r\n  "linkToPortIdProperty": "toPort",\r\n  "nodeDataArray": [ \r\n{"category":"virtual_machine", "text":"VM2", "host_num_cpus":"2", "host_disk_size":"10GB", "host_mem_size":"512MB", "os_architecture":"x86_64", "os_type":"linux", "os_distribution":"cirros", "os_version":"0.3.1", "key":-1, "loc":"-196.683349609375 51.48333740234375"},\r\n{"category":"network", "text":"network", "ip_version":"4", "cidr":"10.101.0.0/24", "start_ip":"10.101.0.100", "end_ip":"10.101.0.150", "key":-2, "loc":"-313.683349609375 318.48333740234375"},\r\n{"category":"virtual_machine", "text":"VM1", "host_num_cpus":"2", "host_disk_size":"10GB", "host_mem_size":"512MB", "os_architecture":"x86_64", "os_type":"linux", "os_distribution":"cirros", "os_version":"0.3.1", "key":-3, "loc":"-422.683349609375 51.883331298828125"},\r\n{"category":"virtual_machine", "text":"VM", "host_num_cpus":"2", "host_disk_size":"10GB", "host_mem_size":"512MB", "os_architecture":"x86_64", "os_type":"linux", "os_distribution":"cirros", "os_version":"0.3.1", "key":-7, "loc":"-295.48333740234375 55.25"}\r\n ],\r\n  "linkDataArray": [ \r\n{"from":-3, "to":-2, "fromPort":"B", "toPort":"T"},\r\n{"from":-7, "to":-2, "fromPort":"B", "toPort":"T"},\r\n{"from":-1, "to":-2, "fromPort":"B", "toPort":"T"}\r\n ]}', 'tosca_definitions_version: tosca_simple_yaml_1_0\ndescription: example for a NSD.\ntopology_template:\n    node_templates:\n    \n        VM-1:\n            type: tosca.nodes.Compute\n            capabilities:\n                # Host container properties\n                host:\n                    properties:\n                       num_cpus: 2\n                       disk_size: 10GB\n                       mem_size: 512MB\n                # Guest Operating System properties\n                os:\n                    properties:\n                        architecture: x86_64\n                        type: linux\n                        distribution: cirros\n                        version: 0.3.1\n                \n        NET-2:\n                type: tosca.nodes.network.Network\n                properties:\n                    ip_version: 4\n                    cidr:   10.101.0.0/24\n                    start_ip: 10.101.0.100\n                    end_ip: 10.101.0.150\n        \n        VM-3:\n            type: tosca.nodes.Compute\n            capabilities:\n                # Host container properties\n                host:\n                    properties:\n                       num_cpus: 2\n                       disk_size: 10GB\n                       mem_size: 512MB\n                # Guest Operating System properties\n                os:\n                    properties:\n                        architecture: x86_64\n                        type: linux\n                        distribution: cirros\n                        version: 0.3.1\n            \n        VM-7:\n            type: tosca.nodes.Compute\n            capabilities:\n                # Host container properties\n                host:\n                    properties:\n                       num_cpus: 2\n                       disk_size: 10GB\n                       mem_size: 512MB\n                # Guest Operating System properties\n                os:\n                    properties:\n                        architecture: x86_64\n                        type: linux\n                        distribution: cirros\n                        version: 0.3.1\n        \n\n        portT-3B-2:\n            type: tosca.nodes.network.Port\n            requirements:\n                - binding:\n                    node: VM-3\n                - link:\n                    node: NET-2\n\n        portT-7B-2:\n            type: tosca.nodes.network.Port\n            requirements:\n                - binding:\n                    node: VM-7\n                - link:\n                    node: NET-2\n\n        portT-1B-2:\n            type: tosca.nodes.network.Port\n            requirements:\n                - binding:\n                    node: VM-1\n                - link:\n                    node: NET-2\n\n                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                \n    outputs:\n    \n            VM-1_ip:\n                        value: { get_attribute: [VM-1, private_address] }\n            \n            VM-3_ip:\n                        value: { get_attribute: [VM-3, private_address] }\n        \n            VM-7_ip:\n                        value: { get_attribute: [VM-7, private_address] }\n    '),
(15, 'test', 'Config test', '{ "class": "go.GraphLinksModel",\r\n  "linkFromPortIdProperty": "fromPort",\r\n  "linkToPortIdProperty": "toPort",\r\n  "nodeDataArray": [ \r\n{"category":"virtual_machine", "text":"VM2", "host_num_cpus":"2", "host_disk_size":"10GB", "host_mem_size":"512MB", "os_architecture":"x86_64", "os_type":"linux", "os_distribution":"cirros", "os_version":"0.3.1", "key":-1, "loc":"-132.48333740234375 -281.51666259765625"},\r\n{"category":"virtual_machine", "text":"VM3", "host_num_cpus":"2", "host_disk_size":"10GB", "host_mem_size":"512MB", "os_architecture":"x86_64", "os_type":"linux", "os_distribution":"cirros", "os_version":"0.3.1", "key":-2, "loc":"39.51666259765625 -275.51666259765625"},\r\n{"category":"network", "text":"network", "ip_version":"4", "cidr":"10.101.0.0/24", "start_ip":"10.101.0.100", "end_ip":"10.101.0.150", "key":-3, "loc":"-52.48333740234375 -123.51666259765625"}\r\n ],\r\n  "linkDataArray": [ \r\n{"from":-1, "to":-3, "fromPort":"B", "toPort":"T"},\r\n{"from":-2, "to":-3, "fromPort":"B", "toPort":"T"}\r\n ]}', 'tosca_definitions_version: tosca_simple_yaml_1_0\ndescription: example for a NSD.\ntopology_template:\n    node_templates:\n    \n        VM2-1:\n            type: tosca.nodes.Compute\n            capabilities:\n                # Host container properties\n                host:\n                    properties:\n                       num_cpus: 2\n                       disk_size: 10GB\n                       mem_size: 512MB\n                # Guest Operating System properties\n                os:\n                    properties:\n                        architecture: x86_64\n                        type: linux\n                        distribution: cirros\n                        version: 0.3.1\n            \n        VM3-2:\n            type: tosca.nodes.Compute\n            capabilities:\n                # Host container properties\n                host:\n                    properties:\n                       num_cpus: 2\n                       disk_size: 10GB\n                       mem_size: 512MB\n                # Guest Operating System properties\n                os:\n                    properties:\n                        architecture: x86_64\n                        type: linux\n                        distribution: cirros\n                        version: 0.3.1\n                \n        network:\n                type: tosca.nodes.network.Network\n                properties:\n                    ip_version: 4\n                    cidr:   10.101.0.0/24\n                    start_ip: 10.101.0.100\n                    end_ip: 10.101.0.150\n    \n\n        portT-1B-3:\n            type: tosca.nodes.network.Port\n            requirements:\n                - binding:\n                    node: -1\n                - link:\n                    node: -3\n\n        portT-2B-3:\n            type: tosca.nodes.network.Port\n            requirements:\n                - binding:\n                    node: -2\n                - link:\n                    node: -3\n\n                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                \n    outputs:\n    \n            VM2_ip:\n                        value: { get_attribute: [VM2-1, private_address] }\n        \n            VM3_ip:\n                        value: { get_attribute: [VM3-2, private_address] }\n        ');

--
-- Contenu de la table `network_function`
--

INSERT INTO `network_function` (`id`, `name`, `attributes`, `NetworkFunctionRole_id`) VALUES
(5, 'VM', 'a:7:{i:0;a:3:{s:4:"name";s:13:"host_num_cpus";s:8:"datatype";s:18:"IntegerType::class";s:5:"value";i:2;}i:1;a:3:{s:4:"name";s:14:"host_disk_size";s:8:"datatype";s:17:"StringType::class";s:5:"value";s:4:"10GB";}i:2;a:3:{s:4:"name";s:13:"host_mem_size";s:8:"datatype";s:17:"StringType::class";s:5:"value";s:5:"512MB";}i:3;a:3:{s:4:"name";s:15:"os_architecture";s:8:"datatype";s:17:"StringType::class";s:5:"value";s:6:"x86_64";}i:4;a:3:{s:4:"name";s:7:"os_type";s:8:"datatype";s:17:"StringType::class";s:5:"value";s:5:"linux";}i:5;a:3:{s:4:"name";s:15:"os_distribution";s:8:"datatype";s:17:"StringType::class";s:5:"value";s:6:"cirros";}i:6;a:3:{s:4:"name";s:10:"os_version";s:8:"datatype";s:17:"StringType::class";s:5:"value";s:5:"0.3.1";}}', 2),
(14, 'network', 'a:4:{i:0;a:3:{s:4:"name";s:10:"ip_version";s:8:"datatype";s:18:"IntegerType::class";s:5:"value";i:4;}i:1;a:3:{s:4:"name";s:4:"cidr";s:8:"datatype";s:17:"StringType::class";s:5:"value";s:13:"10.101.0.0/24";}i:2;a:3:{s:4:"name";s:8:"start_ip";s:8:"datatype";s:17:"StringType::class";s:5:"value";s:12:"10.101.0.100";}i:3;a:3:{s:4:"name";s:6:"end_ip";s:8:"datatype";s:17:"StringType::class";s:5:"value";s:12:"10.101.0.150";}}', 1),
(21, 'FW', 'a:1:{i:0;a:3:{s:4:"name";s:4:"test";s:8:"datatype";s:17:"StringType::class";s:5:"value";s:4:"test";}}', 5),
(22, 'LB', 'a:1:{i:0;a:3:{s:4:"name";s:4:"test";s:8:"datatype";s:17:"StringType::class";s:5:"value";s:4:"test";}}', 7),
(24, 'NAT', 'a:1:{i:0;a:3:{s:4:"name";s:4:"att1";s:8:"datatype";s:18:"BooleanType::class";s:5:"value";i:1;}}', 8);

--
-- Contenu de la table `network_function_role`
--

INSERT INTO `network_function_role` (`id`, `name`, `color`, `shape`, `stroke`) VALUES
(1, 'network', '#66ff99', 'RoundedRectangle', '#00b33c'),
(2, 'virtual_machine', '#66d9ff', 'Cube2', '#0086b3'),
(5, 'Firewall', '#ff8080', 'FireHazard', '#e60000'),
(7, 'LoadBalancer', '#ffc266', 'Cube2', '#ff9900'),
(8, 'NAT', '#668cff', 'Cube1', '#0033cc');

--
-- Contenu de la table `remote_svr`
--

INSERT INTO `remote_svr` (`id`, `name`, `last_config`, `url`, `last_config_date`) VALUES
(2, 'remote_host', NULL, 'http://157.159.103.101:8181/deploy_template', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
