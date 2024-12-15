-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 11:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_description` varchar(5000) NOT NULL,
  `course_duration` varchar(50) NOT NULL,
  `course_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_description`, `course_duration`, `course_image`) VALUES
(1, 'Machine Learning with Python', 'Embark on a journey into the exciting realm of machine learning through our \"Practical Machine Learning with Python\" course. This hands-on program is tailored for individuals seeking a comprehensive introduction to machine learning using Python as the primary tool. Participants will master fundamental concepts, explore popular algorithms, and gain practical skills in building and deploying machine learning models. The course covers essential topics such as data preprocessing, supervised and unsupervised learning, model evaluation, and optimization. Additionally, participants will delve into natural language processing (NLP) and computer vision, equipping them with a versatile skill set. Ethical considerations in machine learning will be emphasized throughout the course. By the end, participants will be well-versed in Python\'s machine learning libraries and possess the knowledge to develop, evaluate, and deploy machine learning solutions in various domains.\r\n\r\nKey Points:\r\n\r\nPython programming basics and essential libraries (NumPy, Pandas, Matplotlib, Scikit-learn).\r\nData preprocessing techniques, including handling missing data and feature scaling.\r\nSupervised learning algorithms: linear regression, logistic regression, decision trees, random forests, SVM, and basics of neural networks.\r\nUnsupervised learning techniques: clustering, dimensionality reduction, and anomaly detection.\r\nModel evaluation through cross-validation and hyperparameter tuning.\r\nIntroduction to NLP with text processing and building a text classifier.\r\nBasics of computer vision, covering image processing and building an image classifier.\r\nConsiderations for model deployment and scalability.\r\nEthical considerations, including bias, fairness, and responsible AI practices.\r\n\r\n\r\n\r\n\r\n\r\n', '33 hrs', '../images/Machine-Learning-with-Python_icon.png'),
(2, 'Aws Cloud', 'Amazon Web Services (AWS) Cloud is a comprehensive and widely adopted cloud computing platform offered by Amazon.com. Renowned for its scalability, reliability, and flexibility, AWS provides a vast array of cloud services, including computing power, storage solutions, and databases, along with machine learning, analytics, and Internet of Things (IoT) capabilities. Users can leverage AWS to build, deploy, and manage applications and services on a global scale, allowing for seamless expansion and adaptation to varying workloads. With a pay-as-you-go pricing model, users only pay for the resources they consume, making AWS an efficient and cost-effective solution for businesses of all sizes. The platform\'s global infrastructure, comprising numerous data centers, ensures high availability and redundancy, contributing to its popularity among startups, enterprises, and government organizations seeking reliable and scalable cloud solutions.', '10hrs', '../images/aws cloud.png'),
(3, 'Introduction to java', 'Java, developed by Sun Microsystems (now owned by Oracle Corporation), is a versatile and widely-used programming language known for its portability, simplicity, and object-oriented approach. Launched in the mid-1990s, Java quickly gained prominence due to its \"Write Once, Run Anywhere\" (WORA) philosophy, enabling developers to create applications that can run on any device with a Java Virtual Machine (JVM). The language\'s syntax is clean and easy to understand, making it accessible for both beginners and experienced programmers. Java\'s platform independence, achieved through its bytecode compilation, allows developers to create applications for diverse environments, from web and mobile to enterprise systems. Its extensive standard library, strong community support, and robust security features contribute to Java\'s enduring popularity in software development for building everything from web applications and mobile apps to large-scale enterprise systems.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '3hrs', '../images/JavaCupLogo800x800.png'),
(5, 'CHATGPT advanced data analysis', 'While ChatGPT excels in natural language understanding and generation, its primary strength lies in processing and generating textual information rather than advanced data analysis. Advanced data analysis typically involves complex statistical modeling, machine learning algorithms, and data manipulation techniques, which are beyond the scope of ChatGPT\'s capabilities. However, ChatGPT can serve as a valuable tool in the data analysis process by assisting in formulating queries, interpreting analysis results, and generating descriptive explanations. Integrating ChatGPT into data analysis workflows can enhance the communication of findings and insights, making it a supportive component in the broader context of advanced data analytics. For in-depth data analysis tasks, specialized tools and platforms designed for statistical modeling and machine learning are more appropriate, but leveraging ChatGPT\'s natural language processing capabilities can contribute to a more accessible and interpretable analysis narrative.', '22 hrs', '../images/chatGPT adv data ana.png'),
(6, 'Deep Learning', 'Deep learning is a subfield of machine learning that focuses on training artificial neural networks to perform complex tasks by simulating the human brain\'s interconnected neuron structure. The term \"deep\" refers to the multiple layers (deep architectures) through which data is processed in these neural networks. Unlike traditional machine learning approaches that may require explicit programming of features, deep learning models autonomously learn hierarchical representations from raw data. This ability to automatically learn intricate patterns and features makes deep learning particularly powerful in tasks such as image and speech recognition, natural language processing, and even playing strategic games. Common deep learning architectures include convolutional neural networks (CNNs) for image-related tasks and recurrent neural networks (RNNs) for sequence-based tasks. The success of deep learning can be attributed to advancements in computing power, the availability of large datasets, and innovations in neural network architectures. Deep learning has significantly impacted various industries, driving breakthroughs in artificial intelligence applications and contributing to the rapid evolution of technology.', '25 hrs', '../images/DeepLearning_Generative_AI_for_Everyone_Banner_1000x1000_F.png'),
(7, 'Data Structures and Algorithms', 'Data structures and algorithms form the backbone of computer science and programming, playing a pivotal role in efficient problem-solving and software development. Data structures are organizational formats for storing and managing data, while algorithms are step-by-step procedures or sets of rules for solving specific problems or performing computations. The choice of appropriate data structures and algorithms significantly influences the performance and efficiency of software applications. Common data structures include arrays, linked lists, stacks, queues, trees, and graphs, each serving specific purposes in organizing and accessing data. Algorithms, on the other hand, dictate how data is manipulated or processed, ranging from simple sorting and searching routines to more complex tasks like pathfinding or machine learning algorithms. Proficiency in data structures and algorithms is fundamental for writing efficient code, optimizing resource usage, and solving problems with scalability in mind. Whether designing databases, developing software applications, or tackling coding interviews, a strong understanding of data structures and algorithms is essential for any computer science professional or aspiring ', '32 hrs', '../images/ds.png'),
(8, 'Cyber Security Analyst', 'A cybersecurity analyst is a specialized professional responsible for safeguarding an organization\'s digital infrastructure and sensitive information from cyber threats. Operating at the forefront of the ongoing battle against cyberattacks, these analysts employ a combination of technical expertise, analytical skills, and strategic thinking. Their primary duties include monitoring network activities, analyzing vulnerabilities, and proactively identifying potential security risks. Cybersecurity analysts design and implement security measures, such as firewalls and encryption protocols, to protect against unauthorized access and data breaches. In the event of a security incident, analysts conduct thorough investigations, assess the extent of the breach, and develop strategies to mitigate the impact. Additionally, they stay abreast of the latest cybersecurity trends, emerging threats, and industry best practices to continuously enhance the organization\'s security posture. Strong communication skills are crucial for cybersecurity analysts, as they often collaborate with various stakeholders to convey security risks and implement effective security policies. Given the ever-evolving nature of cyber threats, cybersecurity analysts play a vital role in maintaining the integrity and resilience of an organization\'s digital assets.', '45 hrs', '../images/ibm-cybersecurity-analyst.png');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enroll_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enroll_id`, `user_id`, `course_id`, `date`) VALUES
(1, 10001, 1, '2023-12-18'),
(3, 10015, 5, '2023-12-24'),
(4, 10001, 5, '2023-12-24'),
(5, 10015, 1, '2023-12-25'),
(9, 10001, 6, '2024-01-10'),
(10, 10001, 2, '2024-01-10'),
(11, 10018, 1, '2024-01-10'),
(12, 10023, 7, '2024-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `lesson_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `lesson_name` varchar(500) NOT NULL,
  `lesson_content` varchar(150) NOT NULL,
  `lesson_no` int(11) NOT NULL,
  `lesson_description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `course_id`, `lesson_name`, `lesson_content`, `lesson_no`, `lesson_description`) VALUES
(1001, 1, 'python introduction', '../videos/What is Python_ _ Python Explained in 2 Minutes For BEGINNERS..mp4', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(1010, 5, 'Chatgpt basics', '../videos/How To Use Chat GPT by Open AI For Beginners.mp4', 1, 'ChatGPT, developed by OpenAI, represents a remarkable advancement in natural language processing and artificial intelligence. Built on the GPT-3.5 architecture, ChatGPT is a powerful language model that excels in generating human-like text based on the input it receives. Trained on diverse and extensive datasets, ChatGPT demonstrates an impressive ability to understand context, generate coherent responses, and adapt to a wide range of conversational topics. Users can engage with ChatGPT for tasks such as content creation, answering questions, and even engaging in dynamic and context-aware conversations. Its versatility makes it a valuable tool for developers, writers, and individuals seeking natural language understanding in various applications. However, it\'s essential to note that while ChatGPT exhibits impressive language capabilities, it may occasionally produce responses that are contextually incorrect or nonsensical, highlighting the ongoing challenges in perfecting AI language models.'),
(1013, 1, 'python basics', '../videos/Learn Python in 59.001 seconds.mp4', 2, 'This module provides a concise introduction to the fundamental aspects of Python programming. Participants will learn the basics of Python syntax, data types, control structures, and functions. The course includes hands-on exercises to reinforce concepts and build practical coding skills. Topics covered include variable assignment, loops, conditional statements, and functions. By the end of this module, participants will have a solid foundation in Python programming, enabling them to confidently explore more advanced topics in data science and machine learning.'),
(1015, 2, 'introduction', '../videos/What is AWS_ _ Amazon Web Services.mp4', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(1017, 1, 'Machine learning introduction', '../videos/Machine Learning Explained in 100 Seconds.mp4', 3, 'Machine learning is a transformative field at the intersection of computer science and artificial intelligence that empowers systems to learn patterns from data and make predictions or decisions without explicit programming. Instead of relying on explicit instructions, machine learning algorithms leverage statistical techniques to identify and generalize patterns, enabling them to improve performance over time. The essence of machine learning lies in its ability to enable computers to learn from experience and adapt to new information, facilitating applications in diverse domains such as image and speech recognition, natural language processing, and predictive analytics. This dynamic discipline has become integral to technological advancements, offering solutions to complex problems and driving innovation across industries.'),
(1018, 1, 'ML with python references', '../videos/Is this still the best book on Machine Learning_.mp4', 4, 'An essential guide for beginners and intermediate learners, this book provides practical insights into machine learning using popular Python libraries like Scikit-Learn and TensorFlow. It covers key concepts, algorithms, and hands-on examples for real-world applications.\r\nTailored for data scientists, this book provides a gentle introduction to machine learning with practical examples using Python. It focuses on the Scikit-Learn library and covers key concepts in a clear and approachable manner.'),
(1019, 1, 'Tensor Flow', '../videos/TensorFlow in 100 Seconds.mp4', 5, 'TensorFlow, developed by the Google Brain team, stands as a cornerstone in the landscape of open-source machine learning frameworks. Revered for its versatility and scalability, TensorFlow empowers developers to construct and deploy machine learning models across diverse applications. Whether tackling image recognition, natural language processing, or reinforcement learning, TensorFlow provides a robust platform. Resources such as \"Hands-On Machine Learning with Scikit-Learn, Keras, and TensorFlow\" by Aurélien Géron and the official TensorFlow documentation serve as invaluable guides for both novices and seasoned practitioners. With a high-level API like Keras seamlessly integrated, TensorFlow simplifies the implementation of intricate neural networks. Its dynamic ecosystem, including tutorials, GitHub repositories, and dedicated courses such as Andrew Ng\'s on Coursera, ensures that learners can explore and harness the full potential of TensorFlow in the dynamic field of machine learning and deep neural networks.'),
(1020, 3, 'Java Basics', '../videos/Java in 100 Seconds.mp4', 1, 'Java, a versatile and widely used programming language, serves as the foundation for countless software applications, web development, and enterprise systems. Known for its platform independence, Java\'s \"write once, run anywhere\" philosophy allows developers to create applications that can run on various devices without modification. At its core, Java employs an object-oriented paradigm, emphasizing modular and reusable code through classes and objects. Key concepts such as variables, data types, control structures (loops and conditionals), and methods form the building blocks of Java programs. With its robust standard library and extensive community support, Java is an excellent choice for beginners entering the world of programming, offering a structured and comprehensive introduction to the essentials of software development.'),
(1021, 5, 'Make money using Chatgpt', '../videos/the ChatGPT store is about to launch… let’s get rich.mp4', 2, 'Using ChatGPT to make money involves leveraging its capabilities for various tasks that add value to individuals or businesses. Freelancers and content creators, for instance, can employ ChatGPT to generate high-quality content, such as blog posts, articles, or social media updates, saving time and effort in the content creation process. Additionally, businesses may integrate ChatGPT into customer support systems to automate responses and provide quick, efficient solutions to user queries. Offering consulting services or expertise in deploying and customizing ChatGPT for specific applications can also be a lucrative avenue. Another way to monetize ChatGPT is by creating and selling specialized chatbots or virtual assistants tailored to meet specific industry needs. It\'s crucial to ensure ethical use and communicate any limitations of AI technology to clients. While ChatGPT can be a valuable tool for generating income, understanding its capabilities and limitations is essential for providing effective and responsible services.\r\n\r\n\r\n\r\n\r\n\r\n\r\n'),
(1022, 7, 'Tree Data Structure', '../videos/Tree data structures in 2 minutes 🌳.mp4', 1, 'The tree data structure is a hierarchical and widely utilized data model in computer science that organizes elements in a hierarchical manner, with a top-level element called the root and subsequent levels branching out into nodes. Each node in the tree holds data and can have child nodes, forming a parent-child relationship. Nodes with no children are termed leaves. The tree structure is prevalent in various algorithms and applications, such as hierarchical file systems, network routing, and hierarchical data representations in databases. Binary trees, with each node having at most two children, are particularly fundamental, while other variations like AVL trees and B-trees provide optimizations for specific use cases. The efficiency of tree structures lies in their ability to facilitate quick search, insertion, and deletion operations. Understanding and effectively implementing tree data structures is essential for programmers to navigate and manipulate hierarchical relationships in diverse computational scenarios.'),
(1023, 8, 'Cyber security introduction', '../videos/What is cyber security_.mp4', 1, 'Cybersecurity, short for \"cybersecurity technology\" or \"computer security,\" is the practice of protecting computer systems, networks, programs, and data from digital attacks, unauthorized access, damage, or theft. It encompasses a broad range of measures, technologies, and best practices designed to safeguard the confidentiality, integrity, and availability of information in the digital realm. Cybersecurity efforts aim to counteract cyber threats, which may include malicious activities such as hacking, phishing, malware attacks, ransomware, and more. Professionals in the field of cybersecurity employ various tools and strategies to identify vulnerabilities, mitigate risks, and respond to security incidents. As technology continues to advance, cybersecurity remains a critical aspect of our digital world, playing a crucial role in protecting individuals, organizations, and governments from the evolving landscape of cyber threats.'),
(1024, 8, 'Packet sniffing', '../videos/packet sniffing.mp4', 2, 'Packet sniffing, also referred to as network sniffing, is a technique employed to intercept and examine data packets flowing across a computer network. This method serves both legitimate purposes, such as network troubleshooting and monitoring, and potentially malicious activities when used without proper authorization. In a legitimate context, network administrators utilize packet sniffers to diagnose issues, analyze traffic patterns, and monitor network performance. This aids in maintaining a robust and efficient network infrastructure. However, the misuse of packet sniffing tools can pose serious security risks. Cybercriminals may exploit these tools to eavesdrop on sensitive information, leading to unauthorized access, data interception, and potential privacy violations. To mitigate these risks, organizations implement encryption protocols and secure their networks with technologies like VPNs, emphasizing the importance of ethical and responsible use of packet sniffing for maintaining the integrity and security of digital communications.');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `tracking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `watched` tinyint(1) NOT NULL,
  `watched_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`tracking_id`, `user_id`, `course_id`, `lesson_id`, `watched`, `watched_date`) VALUES
(7, 10001, 5, 1010, 1, '2023-12-25'),
(8, 10015, 1, 1001, 1, '2023-12-25'),
(9, 10015, 1, 1013, 1, '2023-12-25'),
(12, 10001, 1, 1013, 1, '2024-01-06'),
(19, 10018, 1, 1001, 1, '2024-01-10'),
(20, 10018, 1, 1013, 1, '2024-01-10'),
(21, 10001, 2, 1015, 1, '2024-01-11'),
(22, 10018, 1, 1017, 1, '2024-01-11'),
(23, 10023, 7, 1022, 1, '2024-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`) VALUES
(10001, 'Luffy', 'luffy123', 'luffy123@gmail.com', 'user'),
(10015, 'zoro', 'zoro123', 'zoro123@gmail.com', 'user'),
(10017, 'admin', 'admin123', 'admin123@gmail.com', 'admin'),
(10018, 'Alwin Roy', 'alwin123', 'alwin123@gmail.com', 'user'),
(10019, 'admin2', 'admin2', 'admin2@gmail.com', 'admin'),
(10020, 'admin3', 'admin3', 'admin3@gmail.com', 'admin'),
(10021, 'admin4', 'admin4', 'admin4@gmail.com', 'admin'),
(10022, 'admin5', 'admin5', 'admin5@gmail.com', 'admin'),
(10023, 'Felix ', '124578', 'felix@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enroll_id`),
  ADD KEY `courseid` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`tracking_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `lesson_id` (`lesson_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `tracking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10024;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tracking`
--
ALTER TABLE `tracking`
  ADD CONSTRAINT `tracking_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tracking_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`lesson_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tracking_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
