-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 18 Septembre 2017 à 10:15
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ndui_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `network_config`
--

CREATE TABLE `network_config` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `config_value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `yml_value` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `network_config`
--

INSERT INTO `network_config` (`id`, `name`, `description`, `config_value`, `yml_value`) VALUES
(14, 'SFC1', 'This is an SFC example', '{ \"class\": \"go.GraphLinksModel\",\r\n  \"linkFromPortIdProperty\": \"fromPort\",\r\n  \"linkToPortIdProperty\": \"toPort\",\r\n  \"nodeDataArray\": [ \r\n{\"category\":\"network\", \"text\":\"network\", \"ip_version\":\"4\", \"cidr\":\"10.101.0.0/24\", \"start_ip\":\"10.101.0.100\", \"end_ip\":\"10.101.0.150\", \"key\":-2, \"loc\":\"-304.6833496093751 14.483337402343977\", \"size\":\"238 26\"},\r\n{\"category\":\"Comment\", \"text\":\"Service Function Chain with NAT, Firewall, & IDS network functions\", \"key\":-6, \"loc\":\"-42.41668701171878 -532.533339436849\", \"size\":\"247 89\"},\r\n{\"category\":\"virtual_machine\", \"text\":\"VM\", \"host_num_cpus\":\"2\", \"host_disk_size\":\"10GB\", \"host_mem_size\":\"512MB\", \"os_architecture\":\"x86_64\", \"os_type\":\"sfc_client\", \"os_distribution\":\"ubuntu\", \"os_version\":\"14.04\", \"key\":-9, \"loc\":\"-408.41668701171875 -84.60000610351562\"},\r\n{\"category\":\"virtual_machine\", \"text\":\"VM\", \"host_num_cpus\":\"2\", \"host_disk_size\":\"10GB\", \"host_mem_size\":\"512MB\", \"os_architecture\":\"x86_64\", \"os_type\":\"sfc_client\", \"os_distribution\":\"ubuntu\", \"os_version\":\"14.04\", \"key\":-7, \"loc\":\"-305.41668701171875 -87.60000610351562\"},\r\n{\"category\":\"virtual_machine\", \"text\":\"VM\", \"host_num_cpus\":\"2\", \"host_disk_size\":\"10GB\", \"host_mem_size\":\"512MB\", \"os_architecture\":\"x86_64\", \"os_type\":\"sfc_client\", \"os_distribution\":\"ubuntu\", \"os_version\":\"14.04\", \"key\":-10, \"loc\":\"-107.41668701171861 -86.60000610351562\"},\r\n{\"category\":\"chain_begin\", \"text\":\"in\", \"key\":-1, \"loc\":\"-674.4166870117188 -270.6000061035157\"},\r\n{\"category\":\"chain_end\", \"text\":\"out\", \"key\":-18, \"loc\":\"38.58331298828125 -194.60000610351562\"},\r\n{\"category\":\"input\", \"text\":\"odl\", \"name\":\"odl\", \"type\":\"string\", \"default\":\"192.168.111.28:8181\", \"key\":-16, \"loc\":\"-518.9166870117189 -495.5\", \"size\":\"47 35\"},\r\n{\"category\":\"input\", \"text\":\"att2\", \"name\":\"xyz\", \"type\":\"boolean\", \"default\":\"true\", \"key\":-17, \"loc\":\"-398.4166870117186 -496.5\", \"size\":\"38 37\"},\r\n{\"category\":\"Firewall\", \"text\":\"FW\", \"nsh_aware\":\"1\", \"port\":\"40000\", \"address\":\"~\", \"key\":-19, \"loc\":\"-298.41668701171875 -239.60000610351562\"},\r\n{\"category\":\"Firewall\", \"text\":\"FW\", \"nsh_aware\":\"1\", \"port\":\"40000\", \"address\":\"~\", \"key\":-20, \"loc\":\"-46.41668701171875 -239.60000610351562\"},\r\n{\"category\":\"IDS\", \"text\":\"IDS\", \"nsh_aware\":\"1\", \"port\":\"40000\", \"address\":\"~\", \"key\":-21, \"loc\":\"-554.4166870117188 -239.60000610351562\"},\r\n{\"category\":\"IDS\", \"text\":\"IDS\", \"nsh_aware\":\"1\", \"port\":\"40000\", \"address\":\"~\", \"key\":-22, \"loc\":\"-182.41668701171875 -239.60000610351562\"},\r\n{\"category\":\"NAT\", \"text\":\"NAT\", \"nsh_aware\":\"1\", \"port\":\"40000\", \"address\":\"~\", \"key\":-23, \"loc\":\"-408.41668701171875 -239.60000610351562\"},\r\n{\"category\":\"virtual_link\", \"text\":\"VL\", \"vendor\":\"hp\", \"type\":\"nose\", \"transport_type\":\"car\", \"key\":-8, \"loc\":\"-378.41668701171875 -365.9999999999999\"},\r\n{\"category\":\"virtual_link\", \"text\":\"VL\", \"vendor\":\"~\", \"type\":\"~\", \"transport_type\":\"~\", \"key\":-24, \"loc\":\"-83.41668701171875 -368\"}\r\n ],\r\n  \"linkDataArray\": [ \r\n{\"from\":-22, \"to\":-10, \"fromPort\":\"B\", \"toPort\":\"T\"},\r\n{\"from\":-9, \"to\":-2, \"fromPort\":\"B\", \"toPort\":\"T\"},\r\n{\"from\":-7, \"to\":-2, \"fromPort\":\"B\", \"toPort\":\"T\"},\r\n{\"from\":-10, \"to\":-2, \"fromPort\":\"B\", \"toPort\":\"T\"},\r\n{\"from\":-19, \"to\":-7, \"fromPort\":\"B\", \"toPort\":\"T\"},\r\n{\"from\":-19, \"to\":-22, \"fromPort\":\"R\", \"toPort\":\"L\"},\r\n{\"from\":-22, \"to\":-20, \"fromPort\":\"R\", \"toPort\":\"L\"},\r\n{\"from\":-20, \"to\":-18, \"fromPort\":\"R\", \"toPort\":\"T\"},\r\n{\"from\":-20, \"to\":-10, \"fromPort\":\"B\", \"toPort\":\"T\"},\r\n{\"from\":-21, \"to\":-9, \"fromPort\":\"B\", \"toPort\":\"T\"},\r\n{\"from\":-21, \"to\":-23, \"fromPort\":\"R\", \"toPort\":\"L\"},\r\n{\"from\":-23, \"to\":-19, \"fromPort\":\"R\", \"toPort\":\"L\"},\r\n{\"from\":-23, \"to\":-9, \"fromPort\":\"B\", \"toPort\":\"T\"},\r\n{\"from\":-8, \"to\":-23, \"fromPort\":\"B\", \"toPort\":\"T\"},\r\n{\"from\":-8, \"to\":-19, \"fromPort\":\"B\", \"toPort\":\"T\"},\r\n{\"from\":-24, \"to\":-20, \"fromPort\":\"B\", \"toPort\":\"T\"},\r\n{\"from\":-24, \"to\":-22, \"fromPort\":\"B\", \"toPort\":\"T\"},\r\n{\"from\":-24, \"to\":-19, \"fromPort\":\"B\", \"toPort\":\"T\"},\r\n{\"from\":-21, \"to\":-8, \"fromPort\":\"R\", \"toPort\":\"T\"},\r\n{\"from\":-8, \"to\":-21, \"fromPort\":\"L\", \"toPort\":\"T\"},\r\n{\"from\":-1, \"to\":-21, \"fromPort\":\"B\", \"toPort\":\"L\"}\r\n ]}', 'tosca_definitions_version: tosca_simple_yaml_1_0\ndescription: example for a NSD.\n\ntopology_template:\n\n    inputs:\n                                \n            odl:\n                      type: string\n                      default: 192.168.111.28:8181\n        \n            xyz:\n                      type: boolean\n                      default: true\n                                \n    node_templates:\n        \n        NET-2:\n                type: tosca.nodes.network.Network\n                properties:\n                    ip_version: 4\n                    cidr:   10.101.0.0/24\n                    start_ip: 10.101.0.100\n                    end_ip: 10.101.0.150\n                \n        VM-9:\n            type: tosca.nodes.Compute\n            capabilities:\n                # Host container properties\n                host:\n                    properties:\n                       num_cpus: 2\n                       disk_size: 10GB\n                       mem_size: 512MB\n                # Guest Operating System properties\n                os:\n                    properties:\n                        architecture: x86_64\n                        type: sfc_client\n                        distribution: ubuntu\n                        version: 14.04\n            \n        VM-7:\n            type: tosca.nodes.Compute\n            capabilities:\n                # Host container properties\n                host:\n                    properties:\n                       num_cpus: 2\n                       disk_size: 10GB\n                       mem_size: 512MB\n                # Guest Operating System properties\n                os:\n                    properties:\n                        architecture: x86_64\n                        type: sfc_client\n                        distribution: ubuntu\n                        version: 14.04\n            \n        VM-10:\n            type: tosca.nodes.Compute\n            capabilities:\n                # Host container properties\n                host:\n                    properties:\n                       num_cpus: 2\n                       disk_size: 10GB\n                       mem_size: 512MB\n                # Guest Operating System properties\n                os:\n                    properties:\n                        architecture: x86_64\n                        type: sfc_client\n                        distribution: ubuntu\n                        version: 14.04\n                                                                                                \n\n        PORT-VM-9-NET-2:\n            type: tosca.nodes.network.Port\n            requirements:\n                - binding:\n                    node: VM-9\n                - link:\n                    node: NET-2\n        PORT-VM-7-NET-2:\n            type: tosca.nodes.network.Port\n            requirements:\n                - binding:\n                    node: VM-7\n                - link:\n                    node: NET-2\n        PORT-VM-10-NET-2:\n            type: tosca.nodes.network.Port\n            requirements:\n                - binding:\n                    node: VM-10\n                - link:\n                    node: NET-2\n\n\n        VNF-IDS-22-VM-10:\n            type: tosca.nodes.nfv.VNF\n            properties:\n            attributes:\n                    type: IDS\n                    address: \n                    port: 40000\n                    nsh_aware: 1\n\n            requirements:\n                - host: VM-10\n\n\n        CP-IDS-22-VM-10:\n              type: tosca.nodes.nfv.CP\n              properties:\n              attributes:\n#                    IP_address:\n#                    interface: ens3\n#                    port: 30000\n              requirements:\n                    - virtualBinding: VNF-IDS-22-VM-10\n                    - virtualLink: VL-24\n\n\n        VNF-Firewall-19-VM-7:\n            type: tosca.nodes.nfv.VNF\n            properties:\n            attributes:\n                    type: Firewall\n                    address: \n                    port: 40000\n                    nsh_aware: 1\n\n            requirements:\n                - host: VM-7\n\n\n        CP-Firewall-19-VM-7:\n              type: tosca.nodes.nfv.CP\n              properties:\n              attributes:\n#                    IP_address:\n#                    interface: ens3\n#                    port: 30000\n              requirements:\n                    - virtualBinding: VNF-Firewall-19-VM-7\n                    - virtualLink: VL-24\n\n\n        VNF-Firewall-20-VM-10:\n            type: tosca.nodes.nfv.VNF\n            properties:\n            attributes:\n                    type: Firewall\n                    address: \n                    port: 40000\n                    nsh_aware: 1\n\n            requirements:\n                - host: VM-10\n\n\n        CP-Firewall-20-VM-10:\n              type: tosca.nodes.nfv.CP\n              properties:\n              attributes:\n#                    IP_address:\n#                    interface: ens3\n#                    port: 30000\n              requirements:\n                    - virtualBinding: VNF-Firewall-20-VM-10\n                    - virtualLink: VL-24\n\n\n        VNF-IDS-21-VM-9:\n            type: tosca.nodes.nfv.VNF\n            properties:\n            attributes:\n                    type: IDS\n                    address: \n                    port: 40000\n                    nsh_aware: 1\n\n            requirements:\n                - host: VM-9\n\n\n        CP-IDS-21-VM-9:\n              type: tosca.nodes.nfv.CP\n              properties:\n              attributes:\n#                    IP_address:\n#                    interface: ens3\n#                    port: 30000\n              requirements:\n                    - virtualBinding: VNF-IDS-21-VM-9\n                    - virtualLink: VL-8\n\n\n        VNF-NAT-23-VM-9:\n            type: tosca.nodes.nfv.VNF\n            properties:\n            attributes:\n                    type: NAT\n                    address: \n                    port: 40000\n                    nsh_aware: 1\n\n            requirements:\n                - host: VM-9\n\n\n        CP-NAT-23-VM-9:\n              type: tosca.nodes.nfv.CP\n              properties:\n              attributes:\n#                    IP_address:\n#                    interface: ens3\n#                    port: 30000\n              requirements:\n                    - virtualBinding: VNF-NAT-23-VM-9\n                    - virtualLink: VL-8\n\n\n                                                            \n        VL-8:\n\n              type: tosca.nodes.nfv.VL\n              properties:\n                    vendor: hp\n              attributes:\n                    type: nose\n                    transport_type: car\n\n        \n        VL-24:\n\n              type: tosca.nodes.nfv.VL\n              properties:\n                    vendor: \n              attributes:\n                    type: \n                    transport_type: \n\n            Forwarding_CPIDS-22VM-10CPFirewall-19VM-7CPFirewall-20VM-10CPIDS-21VM-9CPNAT-23VM-9:\n              type: tosca.nodes.nfv.FP\n              description: the path (->CP-IDS-22-VM-10->CP-Firewall-19-VM-7->CP-Firewall-20-VM-10->CP-IDS-21-VM-9->CP-NAT-23-VM-9)\n              properties:\n                    policy:\n              requirements:\n                                  - forwarder: CP-IDS-22-VM-10\n                                  - forwarder: CP-Firewall-19-VM-7\n                                  - forwarder: CP-Firewall-20-VM-10\n                                  - forwarder: CP-IDS-21-VM-9\n                                  - forwarder: CP-NAT-23-VM-9\n              \n                            \n                                                \n\n  #################################################\n  # VNF Forwarding Graph nodes and the associated\n  # Network Forwarding Paths\n  #################################################\n    groups:\n        VNF_FG1:\n              type: tosca.groups.nfv.VNFFG\n              description: VNF forwarding graph\n              properties:\n                    vendor:\n                    version:\n                    connection_point: [ CP-IDS-22-VM-10,CP-Firewall-19-VM-7,CP-Firewall-20-VM-10,CP-IDS-21-VM-9,CP-NAT-23-VM-9 ]\n                    dependent_virtual_link: [ VL1 ]\n                    constituent_vnfs: [ VNF-IDS-22-VM-10,VNF-Firewall-19-VM-7,VNF-Firewall-20-VM-10,VNF-IDS-21-VM-9,VNF-NAT-23-VM-9 ]\n              members: [ Forwarding_CP-IDS-22-VM-10,CP-Firewall-19-VM-7,CP-Firewall-20-VM-10,CP-IDS-21-VM-9,CP-NAT-23-VM-9 ]\n\n    outputs:\n            \n            VM-9_ip:\n                        value: { get_attribute: [VM-9, private_address] }\n        \n            VM-7_ip:\n                        value: { get_attribute: [VM-7, private_address] }\n        \n            VM-10_ip:\n                        value: { get_attribute: [VM-10, private_address] }\n                                                '),
(15, 'NCT', 'NCT Example', '{ \"class\": \"go.GraphLinksModel\",\r\n  \"linkFromPortIdProperty\": \"fromPort\",\r\n  \"linkToPortIdProperty\": \"toPort\",\r\n  \"nodeDataArray\": [ \r\n{\"category\":\"virtual_machine\", \"text\":\"VM2\", \"host_num_cpus\":\"2\", \"host_disk_size\":\"10GB\", \"host_mem_size\":\"512MB\", \"os_architecture\":\"x86_64\", \"os_type\":\"linux\", \"os_distribution\":\"cirros\", \"os_version\":\"0.3.1\", \"key\":-1, \"loc\":\"-132.48333740234375 -281.51666259765625\"},\r\n{\"category\":\"virtual_machine\", \"text\":\"VM3\", \"host_num_cpus\":\"2\", \"host_disk_size\":\"10GB\", \"host_mem_size\":\"512MB\", \"os_architecture\":\"x86_64\", \"os_type\":\"linux\", \"os_distribution\":\"cirros\", \"os_version\":\"0.3.1\", \"key\":-2, \"loc\":\"39.51666259765625 -275.51666259765625\"},\r\n{\"category\":\"network\", \"text\":\"network\", \"ip_version\":\"4\", \"cidr\":\"10.101.0.0/24\", \"start_ip\":\"10.101.0.100\", \"end_ip\":\"10.101.0.150\", \"key\":-3, \"loc\":\"-52.48333740234375 -123.51666259765625\"}\r\n ],\r\n  \"linkDataArray\": [ \r\n{\"from\":-1, \"to\":-3, \"fromPort\":\"B\", \"toPort\":\"T\"},\r\n{\"from\":-2, \"to\":-3, \"fromPort\":\"B\", \"toPort\":\"T\"}\r\n ]}', 'tosca_definitions_version: tosca_simple_yaml_1_0\ndescription: example for a NSD.\ntopology_template:\n    node_templates:\n    \n        VM-1:\n            type: tosca.nodes.Compute\n            capabilities:\n                # Host container properties\n                host:\n                    properties:\n                       num_cpus: 2\n                       disk_size: 10GB\n                       mem_size: 512MB\n                # Guest Operating System properties\n                os:\n                    properties:\n                        architecture: x86_64\n                        type: linux\n                        distribution: cirros\n                        version: 0.3.1\n            \n        VM-2:\n            type: tosca.nodes.Compute\n            capabilities:\n                # Host container properties\n                host:\n                    properties:\n                       num_cpus: 2\n                       disk_size: 10GB\n                       mem_size: 512MB\n                # Guest Operating System properties\n                os:\n                    properties:\n                        architecture: x86_64\n                        type: linux\n                        distribution: cirros\n                        version: 0.3.1\n                \n        NET-3:\n                type: tosca.nodes.network.Network\n                properties:\n                    ip_version: 4\n                    cidr:   10.101.0.0/24\n                    start_ip: 10.101.0.100\n                    end_ip: 10.101.0.150\n    \n\n        portT-1B-3:\n            type: tosca.nodes.network.Port\n            requirements:\n                - binding:\n                    node: VM-1\n                - link:\n                    node: NET-3\n\n        portT-2B-3:\n            type: tosca.nodes.network.Port\n            requirements:\n                - binding:\n                    node: VM-2\n                - link:\n                    node: NET-3\n\n                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                \n    outputs:\n    \n            VM-1_ip:\n                        value: { get_attribute: [VM-1, private_address] }\n        \n            VM-2_ip:\n                        value: { get_attribute: [VM-2, private_address] }\n        ');

-- --------------------------------------------------------

--
-- Structure de la table `network_function`
--

CREATE TABLE `network_function` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attributes` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `NetworkFunctionRole_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `network_function`
--

INSERT INTO `network_function` (`id`, `name`, `attributes`, `NetworkFunctionRole_id`) VALUES
(5, 'VM', 'a:7:{i:0;a:3:{s:4:\"name\";s:13:\"host_num_cpus\";s:8:\"datatype\";s:18:\"IntegerType::class\";s:5:\"value\";i:2;}i:1;a:3:{s:4:\"name\";s:14:\"host_disk_size\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:4:\"10GB\";}i:2;a:3:{s:4:\"name\";s:13:\"host_mem_size\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:5:\"512MB\";}i:3;a:3:{s:4:\"name\";s:15:\"os_architecture\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:6:\"x86_64\";}i:4;a:3:{s:4:\"name\";s:7:\"os_type\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:10:\"sfc_client\";}i:5;a:3:{s:4:\"name\";s:15:\"os_distribution\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:6:\"ubuntu\";}i:6;a:3:{s:4:\"name\";s:10:\"os_version\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:5:\"14.04\";}}', 2),
(14, 'network', 'a:4:{i:0;a:3:{s:4:\"name\";s:10:\"ip_version\";s:8:\"datatype\";s:18:\"IntegerType::class\";s:5:\"value\";i:4;}i:1;a:3:{s:4:\"name\";s:4:\"cidr\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:13:\"10.101.0.0/24\";}i:2;a:3:{s:4:\"name\";s:8:\"start_ip\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:12:\"10.101.0.100\";}i:3;a:3:{s:4:\"name\";s:6:\"end_ip\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:12:\"10.101.0.150\";}}', 1),
(21, 'FW', 'a:3:{i:0;a:3:{s:4:\"name\";s:9:\"nsh_aware\";s:8:\"datatype\";s:18:\"BooleanType::class\";s:5:\"value\";i:1;}i:1;a:3:{s:4:\"name\";s:4:\"port\";s:8:\"datatype\";s:18:\"IntegerType::class\";s:5:\"value\";i:40000;}i:2;a:3:{s:4:\"name\";s:7:\"address\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:1:\"~\";}}', 5),
(22, 'IDS', 'a:3:{i:0;a:3:{s:4:\"name\";s:9:\"nsh_aware\";s:8:\"datatype\";s:18:\"BooleanType::class\";s:5:\"value\";i:1;}i:1;a:3:{s:4:\"name\";s:4:\"port\";s:8:\"datatype\";s:18:\"IntegerType::class\";s:5:\"value\";i:40000;}i:2;a:3:{s:4:\"name\";s:7:\"address\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:1:\"~\";}}', 7),
(24, 'NAT', 'a:3:{i:0;a:3:{s:4:\"name\";s:9:\"nsh_aware\";s:8:\"datatype\";s:18:\"BooleanType::class\";s:5:\"value\";i:1;}i:1;a:3:{s:4:\"name\";s:4:\"port\";s:8:\"datatype\";s:18:\"IntegerType::class\";s:5:\"value\";i:40000;}i:2;a:3:{s:4:\"name\";s:7:\"address\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:1:\"~\";}}', 8),
(25, 'VL', 'a:3:{i:0;a:3:{s:4:\"name\";s:6:\"vendor\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:1:\"~\";}i:1;a:3:{s:4:\"name\";s:4:\"type\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:1:\"~\";}i:2;a:3:{s:4:\"name\";s:14:\"transport_type\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:1:\"~\";}}', 9),
(26, 'input', 'a:3:{i:0;a:3:{s:4:\"name\";s:4:\"name\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:1:\"~\";}i:1;a:3:{s:4:\"name\";s:4:\"type\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:1:\"~\";}i:2;a:3:{s:4:\"name\";s:7:\"default\";s:8:\"datatype\";s:17:\"StringType::class\";s:5:\"value\";s:1:\"~\";}}', 11);

-- --------------------------------------------------------

--
-- Structure de la table `network_function_role`
--

CREATE TABLE `network_function_role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stroke` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shape` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `network_function_role`
--

INSERT INTO `network_function_role` (`id`, `name`, `color`, `stroke`, `shape`) VALUES
(1, 'network', '#66ff99', '#00b33c', 'RoundedRectangle'),
(2, 'virtual_machine', '#66d9ff', '#0086b3', 'Cube2'),
(5, 'Firewall', '#ff8080', '#e60000', 'FireHazard'),
(7, 'IDS', '#ffc266', '#ff9900', 'Cube1'),
(8, 'NAT', '#668cff', '#0033cc', 'Cube1'),
(9, 'virtual_link', '#d5ff80', '#99e600', 'Clock'),
(10, 'start', '#cccccc', '#666666', 'Circle'),
(11, 'input', '#cce5ff', '#0063cc', 'ManualInput');

-- --------------------------------------------------------

--
-- Structure de la table `remote_svr`
--

CREATE TABLE `remote_svr` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_config` longtext COLLATE utf8_unicode_ci,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_config_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `remote_svr`
--

INSERT INTO `remote_svr` (`id`, `name`, `last_config`, `url`, `last_config_date`) VALUES
(2, 'remote_host', NULL, 'http://157.159.103.101:8181/deploy_template', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `symbol`
--

CREATE TABLE `symbol` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `networkFunctionRole_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `symbol`
--

INSERT INTO `symbol` (`id`, `path`, `networkFunctionRole_id`) VALUES
('bb9677e2-25c7-11e7-b4f1-02004c4f4f50', 'png', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `network_config`
--
ALTER TABLE `network_config`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `network_function`
--
ALTER TABLE `network_function`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_676D2DAC5E237E06` (`name`),
  ADD KEY `IDX_676D2DACBAD223C9` (`NetworkFunctionRole_id`);

--
-- Index pour la table `network_function_role`
--
ALTER TABLE `network_function_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_87705A165E237E06` (`name`);

--
-- Index pour la table `remote_svr`
--
ALTER TABLE `remote_svr`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F204C0295E237E06` (`name`);

--
-- Index pour la table `symbol`
--
ALTER TABLE `symbol`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_ECC836F9324DB10A` (`networkFunctionRole_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `network_config`
--
ALTER TABLE `network_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `network_function`
--
ALTER TABLE `network_function`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `network_function_role`
--
ALTER TABLE `network_function_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `remote_svr`
--
ALTER TABLE `remote_svr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `network_function`
--
ALTER TABLE `network_function`
  ADD CONSTRAINT `FK_676D2DACBAD223C9` FOREIGN KEY (`NetworkFunctionRole_id`) REFERENCES `network_function_role` (`id`);

--
-- Contraintes pour la table `symbol`
--
ALTER TABLE `symbol`
  ADD CONSTRAINT `FK_ECC836F9324DB10A` FOREIGN KEY (`networkFunctionRole_id`) REFERENCES `network_function_role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
